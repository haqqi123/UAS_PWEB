<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index()
    {
        return view('umkm.index');
    }

    public function show($id)
    {
        $umkm = UMKM::where('status', 'diterima')->findOrFail($id);

        // Get related UMKM (same category, excluding current)
        $related = UMKM::where('status', 'diterima')
            ->where('id', '!=', $umkm->id)
            ->where('kategori', $umkm->kategori)
            ->limit(4)
            ->get();

        return view('umkm.show', compact('umkm', 'related'));
    }
}
