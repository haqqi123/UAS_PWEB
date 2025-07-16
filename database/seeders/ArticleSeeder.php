<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'judul' => 'Pembangunan Jalan Desa',
                'isi' => 'Desa kita telah memulai proyek pembangunan jalan yang menghubungkan dusun A dan dusun B. Proyek ini diharapkan selesai dalam 3 bulan.',
                'penulis' => 'Admin Desa',
                'thumbnail' => 'images/articles/jalan-desa.jpg',
            ],
            [
                'judul' => 'Program Vaksinasi Covid-19',
                'isi' => 'Program vaksinasi Covid-19 tahap kedua akan dilaksanakan minggu depan di balai desa. Warga dimohon untuk membawa KTP.',
                'penulis' => 'Tim Kesehatan',
                'thumbnail' => 'images/articles/vaksinasi.jpg',
            ],
            [
                'judul' => 'Pelatihan UMKM Digital',
                'isi' => 'Pelatihan penggunaan media sosial dan marketplace untuk UMKM desa akan diadakan bulan depan. Pendaftaran dibuka untuk semua pelaku UMKM.',
                'penulis' => 'Tim UMKM',
                'thumbnail' => 'images/articles/umkm-digital.jpg',
            ],
            [
                'judul' => 'Gotong Royong Membersihkan Sungai',
                'isi' => 'Kegiatan gotong royong membersihkan sungai desa akan dilaksanakan hari Minggu. Warga diharapkan membawa peralatan kebersihan.',
                'penulis' => 'Karang Taruna',
                'thumbnail' => 'images/articles/gotong-royong.jpg',
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
