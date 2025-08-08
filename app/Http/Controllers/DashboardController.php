<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PopulationStatistic;
use App\Models\Organisation;
use App\Models\Article;
use App\Models\UMKM;

class DashboardController extends Controller
{
    public function index()
    {
        $statistik = PopulationStatistic::latest()->first();
        $organisations = Organisation::all();
        $artikel = Article::latest()->get();
        $umkm = UMKM::where('status', 'diterima')
            ->latest()
            ->get();

        // Data dummy sementara untuk profil, kontak
        $profil = [
            'sejarah' => 'Desa Suci didirikan pada tahun 1850 oleh sekelompok pendatang dari daerah Mataram yang mencari tempat baru untuk bermukim. Nama "Suci" diambil dari mata air jernih yang ditemukan di tengah hutan yang sekarang menjadi pusat desa. Pada awalnya, Desa Suci hanya terdiri dari 15 kepala keluarga yang hidup dari bertani dan membuat kerajinan dari bambu. Mata air tersebut dianggap keramat dan menjadi tempat ritual masyarakat hingga kini. Pada tahun 1930, Desa Suci mulai berkembang pesat setelah dibangunnya jalan penghubung ke kota kecamatan. Tradisi kerajinan bambu terus dilestarikan dan menjadi ciri khas desa hingga sekarang.',
            'visi' => 'Menjadi desa mandiri dan sejahtera',
            'misi' => [
                'Meningkatkan kualitas hidup masyarakat',
                'Mengembangkan potensi lokal',
                'Meningkatkan pelayanan publik',
            ],
        ];
        $kontak = [
            'alamat' => 'Kalibaru Manis, Kecamatan Kalibaru, Kabupaten Banyuwangi',
            'telepon' => '0331-123456',
            'email' => 'info@desasuci.id',
            'maps' => 'https://maps.google.com/?q=-8.172,113.700',
        ];

        return view('dashboard', compact('statistik', 'organisations', 'profil', 'kontak', 'artikel', 'umkm'));
    }
}
