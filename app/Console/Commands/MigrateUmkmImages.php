<?php

namespace App\Console\Commands;

use App\Models\UMKM;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MigrateUmkmImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'umkm:migrate-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate UMKM images from public/images/umkm to Laravel Storage';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting UMKM images migration...');

        $oldImagesPath = public_path('images/umkm');

        if (!File::exists($oldImagesPath)) {
            $this->error('Old images directory does not exist: ' . $oldImagesPath);
            return 1;
        }

        // Get all UMKM records that have foto_usaha
        $umkmRecords = UMKM::whereNotNull('foto_usaha')->get();

        if ($umkmRecords->isEmpty()) {
            $this->info('No UMKM records with images found.');
            return 0;
        }

        $migratedCount = 0;
        $errorCount = 0;

        $this->info("Found {$umkmRecords->count()} UMKM records with images.");

        foreach ($umkmRecords as $umkm) {
            $oldImagePath = $oldImagesPath . '/' . $umkm->foto_usaha;

            if (!File::exists($oldImagePath)) {
                $this->warn("Image not found for UMKM {$umkm->id}: {$oldImagePath}");
                $errorCount++;
                continue;
            }

            try {
                // Generate new filename with path
                $extension = File::extension($oldImagePath);
                $newFilename = time() . '_' . str_replace(' ', '_', $umkm->nama_usaha) . '.' . $extension;
                $newPath = 'umkm/' . $newFilename;

                // Copy file to storage
                Storage::disk('public')->put($newPath, File::get($oldImagePath));

                // Resize image
                $storagePath = storage_path('app/public/' . $newPath);
                $image = Image::make($storagePath);
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->save($storagePath, 90);

                // Update database record
                $umkm->update(['foto_usaha' => $newPath]);

                $this->info("✓ Migrated: {$umkm->nama_usaha} -> {$newPath}");
                $migratedCount++;
            } catch (\Exception $e) {
                $this->error("✗ Failed to migrate {$umkm->nama_usaha}: " . $e->getMessage());
                $errorCount++;
            }
        }

        $this->info("\nMigration completed!");
        $this->info("Successfully migrated: {$migratedCount} images");

        if ($errorCount > 0) {
            $this->warn("Failed to migrate: {$errorCount} images");
        }

        if ($migratedCount > 0) {
            $this->info("\nYou can now safely remove the old images directory:");
            $this->line("rm -rf " . $oldImagesPath);
        }

        return 0;
    }
}
