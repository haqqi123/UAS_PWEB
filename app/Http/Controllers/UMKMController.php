<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index()
    {
        $umkm = UMKM::latest()->paginate(12);
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
}
