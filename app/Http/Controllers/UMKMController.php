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

            // Store file using Laravel Storage
            $path = $file->storeAs('umkm', $filename, 'public');

            // Resize image using Intervention Image
            $fullPath = storage_path('app/public/' . $path);
            $image = Image::make($fullPath);
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save($fullPath, 90);

            $validated['foto_usaha'] = $path;
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
