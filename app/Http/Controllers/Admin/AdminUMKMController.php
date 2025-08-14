<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUMKMController extends Controller
{
    public function index(Request $request)
    {
        // Query untuk UMKM yang menunggu persetujuan
        $pendingQuery = UMKM::query()->where('status', 'menunggu');

        // Filter tanggal untuk pending UMKM
        if ($request->start_date) {
            $pendingQuery->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $pendingQuery->whereDate('created_at', '<=', $request->end_date);
        }

        $pendingUMKM = $pendingQuery->latest()->paginate(10, ['*'], 'pending_page');

        // Query untuk semua UMKM
        $allQuery = UMKM::query();

        // Filter tanggal untuk semua UMKM
        if ($request->all_start_date) {
            $allQuery->whereDate('created_at', '>=', $request->all_start_date);
        }
        if ($request->all_end_date) {
            $allQuery->whereDate('created_at', '<=', $request->all_end_date);
        }

        // Filter status untuk semua UMKM
        if ($request->status) {
            $allQuery->where('status', $request->status);
        }

        $allUMKM = $allQuery->latest()->paginate(10, ['*'], 'all_page');

        return view('admin.umkm.index', compact('pendingUMKM', 'allUMKM'));
    }

    public function approve(String $id)
    {
        $umkm = UMKM::findOrFail($id);

        $umkm->update([
            'status' => 'diterima',
            'catatan_status' => 'UMKM telah disetujui'
        ]);

        return redirect()->back()->with('success', 'UMKM berhasil disetujui');
    }

    public function reject(Request $request, String $id)
    {
        $validated = $request->validate([
            'catatan_status' => 'required|string'
        ]);

        $umkm = UMKM::findOrFail($id);

        $umkm->update([
            'status' => 'ditolak',
            'catatan_status' => $validated['catatan_status']
        ]);

        return redirect()->back()->with('success', 'UMKM berhasil ditolak');
    }

    public function show(UMKM $umkm)
    {
        return view('admin.umkm.show', compact('umkm'));
    }

    public function updateStatus(Request $request, String $id)
    {
        $umkm = UMKM::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'status' => 'required|in:menunggu,diterima,ditolak',
            'catatan_status' => 'required_if:status,ditolak|nullable|string'
        ]);

        // Cek jika status baru sama dengan status sekarang
        if ($validated['status'] === $umkm->status) {
            return redirect()->back()->with('error', "UMKM sudah berstatus {$umkm->status}");
        }

        // Set catatan status sesuai dengan status yang dipilih
        if ($validated['status'] === 'diterima') {
            $validated['catatan_status'] = 'UMKM telah disetujui';
        } elseif ($validated['status'] === 'menunggu') {
            $validated['catatan_status'] = 'UMKM dikembalikan ke status menunggu';
        }
        // Untuk status ditolak, catatan_status sudah diisi dari form

        $umkm->update([
            'status' => $validated['status'],
            'catatan_status' => $validated['catatan_status']
        ]);

        return redirect()->back()->with('success', 'Status UMKM berhasil diperbarui');
    }

    public function destroy(String $id)
    {
        $umkm = UMKM::findOrFail($id);

        // Delete foto if exists
        if ($umkm->foto_usaha && Storage::disk('public')->exists($umkm->foto_usaha)) {
            Storage::disk('public')->delete($umkm->foto_usaha);
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus');
    }
}
