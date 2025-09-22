<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UMKMController extends Controller
{
    public function index()
    {
        $umkm = UMKM::where('status', 'diterima')->latest()->paginate(12);
        return view('umkm.index', compact('umkm'));
    }

    public function show(UMKM $umkm)
    {
        $umkm = UMKM::where('status', 'diterima')->findOrFail($umkm->id);

        // Get related UMKM (same category, excluding current)
        $related = UMKM::where('status', 'diterima')
            ->where('id', '!=', $umkm->id)
            ->where('kategori', $umkm->kategori)
            ->limit(4)
            ->get();

        return view('umkm.show', compact('umkm', 'related'));
    }

    public function create()
    {
        return view('umkm.tambah-umkm');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'nama_usaha' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jenis_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_minimum' => 'required|numeric|min:0',
            'harga_maximum' => 'required|numeric|min:0|gte:harga_minimum',
            'whatsapp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'alamat' => 'required|string',
            'foto_usaha' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('foto_usaha')) {
            $file = $request->file('foto_usaha');
            $filename = time() . '_' . Str::slug($request->nama_usaha) . '.' . $file->getClientOriginalExtension();

            // Create image instance and resize
            $img = Image::make($file->getRealPath());

            // Resize to maintain aspect ratio with maximum dimensions
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // Save image to storage
            $storagePath = 'umkm/' . $filename;
            Storage::disk('public')->put($storagePath, (string) $img->encode());

            $validated['foto_usaha'] = $storagePath;
        }

        // Format nomor WhatsApp
        $whatsapp = $validated['whatsapp'];
        if (!str_starts_with($whatsapp, '62')) {
            $whatsapp = '62' . ltrim($whatsapp, '0');
        }
        $validated['whatsapp'] = $whatsapp;

        // Set status default
        $validated['status'] = 'menunggu';

        // Simpan UMKM
        UMKM::create($validated);

        return redirect()->route('umkm.index')
            ->with('success', 'UMKM berhasil didaftarkan dan sedang menunggu persetujuan admin.');
    }
}
