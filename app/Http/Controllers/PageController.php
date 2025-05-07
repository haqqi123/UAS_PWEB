<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validCredentials = [
            'username' => 'admin',
            'password' => 'password123'
        ];

        if ($request->username === $validCredentials['username'] && 
            $request->password === $validCredentials['password']) {
            return redirect()->route('dashboard', ['username' => $request->username]);
        }

        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ]);
    }

    public function dashboard(Request $request)
    {
        $articles = [
            [
                'title' => 'Festival UMKM Desa Suci',
                'content' => 'Desa Suci mengadakan festival UMKM tahunan dengan berbagai produk lokal yang mencerminkan kekayaan budaya dan kreativitas warganya. Festival ini menjadi ajang berkumpulnya para pelaku usaha kecil dan menengah dari berbagai sektor, mulai dari kuliner tradisional, kerajinan tangan, fashion etnik, hingga produk inovatif berbasis teknologi lokal.'
            ],
            [
                'title' => 'Pelatihan Kewirausahaan',
                'content' => 'Desa Suci menyelenggarakan pelatihan kewirausahaan untuk pengembangan UMKM sebagai bagian dari upaya meningkatkan kapasitas dan daya saing pelaku usaha lokal. Kegiatan ini diinisiasi oleh pemerintah desa bekerja sama dengan berbagai pihak, seperti dinas koperasi, lembaga pendidikan, serta komunitas bisnis yang peduli terhadap pemberdayaan ekonomi masyarakat desa.'
            ]
        ];

        return view('dashboard', [
            'username' => $request->query('username'),
            'articles' => $articles
        ]);
    }

    public function pengelolaan()
    {
        $umkms = UMKM::all();
        return view('pengelolaan', compact('umkms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama_UMKM' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'Harga_Minimum' => 'required|integer',
            'Harga_Maximum' => 'required|integer',
            'Gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = time().'.'.$request->Gambar->extension();  
        $request->Gambar->move(public_path('images'), $imageName);

        UMKM::create([
            'Nama_UMKM' => $request->Nama_UMKM,
            'Deskripsi' => $request->Deskripsi,
            'Harga_Minimum' => $request->Harga_Minimum,
            'Harga_Maximum' => $request->Harga_Maximum,
            'Gambar' => $imageName
        ]);

        return redirect()->route('pengelolaan')->with('success', 'UMKM berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama_UMKM' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'Harga_Minimum' => 'required|integer',
            'Harga_Maximum' => 'required|integer',
            'Gambar' => '$1746631574.jpg'
        ]);

        $umkm = UMKM::findOrFail($id);
        $data = $request->except('Gambar');

        if ($request->hasFile('Gambar')) {
            // Hapus gambar lama jika ada
            if ($umkm->Gambar && file_exists(public_path('images/'.$umkm->Gambar))) {
                unlink(public_path('images/'.$umkm->Gambar));
            }
            
            $imageName = time().'.'.$request->Gambar->extension();  
            $request->Gambar->move(public_path('images'), $imageName);
            $data['Gambar'] = $imageName;
        }

        $umkm->update($data);

        return redirect()->route('pengelolaan')->with('success', 'UMKM berhasil diperbarui');
    }

    public function destroy($id)
    {
        $umkm = umkm::findOrFail($id);
        
        // Hapus gambar terkait
        if ($umkm->Gambar && file_exists(public_path('images/'.$umkm->Gambar))) {
            unlink(public_path('images/'.$umkm->Gambar));
        }
        
        $umkm->delete();

        return redirect()->route('pengelolaan')->with('success', 'UMKM berhasil dihapus');
    }

    public function profile()
    {
        return view('profile', ['selectedUmkm' => [
        [
            'name' => 'Kerajinan Bambu Suci',
            'description' => 'Menyediakan berbagai kerajinan tangan dari bambu seperti tempat tisu, vas bunga, dan furniture. Produk kami dibuat dengan bahan berkualitas dan proses yang teliti.',
            'price_range' => 'Rp 50.000 - Rp 500.000',
            'image' => 'image (1).jpg'
        ]
        ]]);
    }
}