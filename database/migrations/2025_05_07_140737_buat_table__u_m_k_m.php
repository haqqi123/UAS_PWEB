<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('nik', 16);
            $table->string('nama_usaha');
            $table->string('jenis_produk');
            $table->text('deskripsi');
            $table->decimal('harga_minimum', 12, 2)->default(0);
            $table->decimal('harga_maximum', 12, 2)->default(0);
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat');
            $table->string('foto_usaha')->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->text('catatan_status')->nullable();
            $table->string('kategori');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
