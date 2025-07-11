<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'judul' => 'Pembangunan Jalan Desa Tahap 2 Dimulai',
                'isi' => 'Pembangunan jalan desa tahap kedua telah dimulai pada awal bulan ini. Proyek ini merupakan kelanjutan dari pembangunan tahap pertama yang telah selesai tahun lalu. Pembangunan akan mencakup perbaikan jalan sepanjang 2,5 kilometer yang menghubungkan dusun timur dengan pusat desa. Diharapkan dengan selesainya proyek ini, akses transportasi warga akan semakin lancar dan dapat meningkatkan mobilitas ekonomi masyarakat.',
                'penulis' => 'Ahmad Sulaiman',
                'views' => 156,
                'created_at' => Carbon::now()->subDays(2),
                'thumbnail' => 'images/articles/jalan-desa.jpg'
            ],
            [
                'judul' => 'Festival Budaya Desa Sukses Digelar',
                'isi' => 'Festival Budaya Desa yang digelar selama tiga hari berturut-turut telah sukses dilaksanakan. Acara yang menampilkan berbagai kesenian tradisional ini dihadiri oleh ribuan pengunjung dari berbagai daerah. Pertunjukan yang paling menarik perhatian adalah penampilan tari tradisional dan pameran kerajinan tangan khas desa. Festival ini tidak hanya berhasil melestarikan budaya lokal tetapi juga membuka peluang ekonomi bagi para pengrajin lokal.',
                'penulis' => 'Siti Aminah',
                'views' => 243,
                'created_at' => Carbon::now()->subDays(5),
                'thumbnail' => 'images/articles/festival-budaya.jpg'
            ],
            [
                'judul' => 'Program Pelatihan UMKM Digital',
                'isi' => 'Dalam rangka meningkatkan kapasitas pelaku UMKM di era digital, desa mengadakan pelatihan digitalisasi UMKM. Program ini mencakup pelatihan penggunaan media sosial untuk pemasaran, manajemen keuangan digital, dan strategi penjualan online. Sebanyak 50 pelaku UMKM telah berpartisipasi dalam program yang berlangsung selama dua hari ini. Para peserta mendapatkan pengetahuan praktis tentang cara memanfaatkan teknologi digital untuk mengembangkan usaha mereka.',
                'penulis' => 'Budi Santoso',
                'views' => 189,
                'created_at' => Carbon::now()->subDays(7),
                'thumbnail' => 'images/articles/pelatihan-umkm.jpg'
            ],
            [
                'judul' => 'Posyandu Desa Raih Penghargaan Tingkat Kabupaten',
                'isi' => 'Posyandu desa berhasil meraih penghargaan sebagai Posyandu Teladan Tingkat Kabupaten. Penghargaan ini diberikan atas dedikasi dan inovasi dalam memberikan pelayanan kesehatan kepada masyarakat, khususnya ibu dan anak. Program unggulan seperti pemantauan tumbuh kembang balita dan edukasi gizi menjadi faktor utama dalam penilaian. Prestasi ini menjadi motivasi untuk terus meningkatkan kualitas pelayanan kesehatan di desa.',
                'penulis' => 'Dewi Kusuma',
                'views' => 167,
                'created_at' => Carbon::now()->subDays(10),
                'thumbnail' => 'images/articles/posyandu.jpg'
            ],
            [
                'judul' => 'Launching Program Bank Sampah',
                'isi' => 'Program Bank Sampah desa resmi diluncurkan sebagai solusi pengelolaan sampah yang berkelanjutan. Program ini tidak hanya bertujuan untuk mengurangi volume sampah, tetapi juga memberikan nilai ekonomis bagi masyarakat. Warga dapat menukarkan sampah yang telah dipilah dengan point yang dapat dikonversi menjadi uang atau kebutuhan pokok. Dalam satu bulan uji coba, program ini telah berhasil mengumpulkan lebih dari 1 ton sampah plastik.',
                'penulis' => 'Rini Widyawati',
                'views' => 134,
                'created_at' => Carbon::now()->subDays(12),
                'thumbnail' => 'images/articles/bank-sampah.jpg'
            ],
            [
                'judul' => 'Pembentukan Kelompok Tani Milenial',
                'isi' => 'Sebuah inisiatif baru telah diluncurkan dengan pembentukan Kelompok Tani Milenial desa. Program ini bertujuan untuk menarik minat generasi muda terhadap sektor pertanian melalui penerapan teknologi modern. Kelompok ini akan menerapkan sistem pertanian presisi dengan menggunakan sensor IoT dan drone untuk pemantauan tanaman. Diharapkan program ini dapat meningkatkan produktivitas pertanian sekaligus membuka lapangan kerja bagi generasi muda.',
                'penulis' => 'Fajar Pradana',
                'views' => 198,
                'created_at' => Carbon::now()->subDays(15),
                'thumbnail' => 'images/articles/tani-milenial.jpg'
            ]
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
