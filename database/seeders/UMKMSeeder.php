<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UMKM;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $umkm = [
            [
                'nama_pemilik' => 'Siti Aminah',
                'nik' => '3509101234567890',
                'nama_usaha' => 'Warung Sambal Bu Siti',
                'jenis_produk' => 'Sambal Kemasan & Catering',
                'deskripsi' => 'Menyediakan berbagai macam sambal tradisional kemasan dan melayani pesanan catering untuk berbagai acara. Semua produk dibuat dengan bahan-bahan segar dan diolah secara higienis. Tersedia berbagai varian seperti sambal bawang, sambal terasi, sambal ijo, dan sambal pencok.',
                'harga_minimum' => 15000,
                'harga_maximum' => 250000,
                'whatsapp' => '081234567890',
                'email' => 'sambalbusiti@gmail.com',
                'alamat' => 'Jl. Mawar No. 15, Dusun Krajan',
                'foto_usaha' => 'sambal-busiti.jpg',
                'status' => 'diterima',
                'kategori' => 'Makanan',
                'created_at' => Carbon::now()->subDays(30),
                'slug' => 'warung-sambal-bu-siti-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Ahmad Fauzi',
                'nik' => '3509101234567891',
                'nama_usaha' => 'Kerajinan Bambu Asri',
                'jenis_produk' => 'Kerajinan Bambu',
                'deskripsi' => 'Menghasilkan berbagai produk kerajinan bambu berkualitas tinggi, mulai dari perabotan rumah tangga hingga dekorasi. Setiap produk dibuat dengan ketelitian dan sentuhan artistik tradisional. Menerima pesanan custom sesuai keinginan pelanggan.',
                'harga_minimum' => 50000,
                'harga_maximum' => 2500000,
                'whatsapp' => '081234567891',
                'email' => 'bamboe.asri@gmail.com',
                'alamat' => 'Jl. Kenanga No. 7, Dusun Timur',
                'foto_usaha' => 'bambu-asri.jpg',
                'status' => 'diterima',
                'kategori' => 'Kerajinan',
                'created_at' => Carbon::now()->subDays(25),
                'slug' => 'kerajinan-bambu-asri-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Maya Sari',
                'nik' => '3509101234567892',
                'nama_usaha' => 'Batik Tulis Maya',
                'jenis_produk' => 'Batik Tulis & Fashion',
                'deskripsi' => 'Memproduksi batik tulis dengan motif khas daerah. Tersedia dalam berbagai model pakaian modern. Menerima pesanan seragam dan busana custom. Semua produk menggunakan pewarna alami dan dikerjakan oleh pengrajin terampil.',
                'harga_minimum' => 150000,
                'harga_maximum' => 5000000,
                'whatsapp' => '081234567892',
                'email' => 'batiktulis.maya@gmail.com',
                'alamat' => 'Jl. Melati No. 23, Dusun Barat',
                'foto_usaha' => 'batik-maya.jpg',
                'status' => 'diterima',
                'kategori' => 'Fashion',
                'created_at' => Carbon::now()->subDays(20),
                'slug' => 'batik-tulis-maya-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Budi Santoso',
                'nik' => '3509101234567893',
                'nama_usaha' => 'Toko Kue Manis',
                'jenis_produk' => 'Kue Tradisional',
                'deskripsi' => 'Menyediakan aneka kue tradisional dan modern. Spesialis kue basah dan kering untuk berbagai acara. Menerima pesanan untuk acara pernikahan, pengajian, dan hajatan lainnya. Tersedia layanan delivery dalam kota.',
                'harga_minimum' => 25000,
                'harga_maximum' => 1000000,
                'whatsapp' => '081234567893',
                'email' => 'tokokuemanis@gmail.com',
                'alamat' => 'Jl. Dahlia No. 45, Dusun Selatan',
                'foto_usaha' => 'kue-manis.jpg',
                'status' => 'diterima',
                'kategori' => 'Makanan',
                'created_at' => Carbon::now()->subDays(15),
                'slug' => 'toko-kue-manis-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Rudi Hartono',
                'nik' => '3509101234567894',
                'nama_usaha' => 'Bengkel Las Sejahtera',
                'jenis_produk' => 'Jasa Las & Konstruksi',
                'deskripsi' => 'Melayani jasa pengelasan untuk berbagai keperluan. Spesialis pembuatan pagar, teralis, kanopi, dan konstruksi besi lainnya. Pengerjaan rapi dengan hasil yang tahan lama. Gratis survei lokasi untuk area sekitar desa.',
                'harga_minimum' => 200000,
                'harga_maximum' => 10000000,
                'whatsapp' => '081234567894',
                'email' => 'las.sejahtera@gmail.com',
                'alamat' => 'Jl. Anggrek No. 12, Dusun Utara',
                'foto_usaha' => 'las-sejahtera.jpg',
                'status' => 'diterima',
                'kategori' => 'Jasa',
                'created_at' => Carbon::now()->subDays(10),
                'slug' => 'bengkel-las-sejahtera-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Dewi Lestari',
                'nik' => '3509101234567895',
                'nama_usaha' => 'Salon Cantik',
                'jenis_produk' => 'Jasa Salon & Kecantikan',
                'deskripsi' => 'Menyediakan layanan salon lengkap mulai dari potong rambut, creambath, facial, sampai makeup untuk berbagai acara. Menggunakan produk berkualitas dan pelayanan profesional. Tersedia paket spesial untuk acara pernikahan.',
                'harga_minimum' => 30000,
                'harga_maximum' => 2000000,
                'whatsapp' => '081234567895',
                'email' => 'salon.cantik@gmail.com',
                'alamat' => 'Jl. Cempaka No. 33, Dusun Tengah',
                'foto_usaha' => 'salon-cantik.jpg',
                'status' => 'diterima',
                'kategori' => 'Jasa',
                'created_at' => Carbon::now()->subDays(5),
                'slug' => 'salon-cantik-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Hendra Wijaya',
                'nik' => '3509101234567896',
                'nama_usaha' => 'Tani Hidroponik Maju',
                'jenis_produk' => 'Sayuran Hidroponik',
                'deskripsi' => 'Memproduksi sayuran hidroponik segar dan berkualitas. Tersedia berbagai jenis sayuran seperti selada, pakcoy, kangkung, dan bayam. Bebas pestisida dan dijamin kesegarannya. Melayani pesanan untuk rumah tangga dan restoran.',
                'harga_minimum' => 10000,
                'harga_maximum' => 100000,
                'whatsapp' => '081234567896',
                'email' => 'hidroponik.maju@gmail.com',
                'alamat' => 'Jl. Bougenville No. 8, Dusun Timur',
                'foto_usaha' => 'hidroponik-maju.jpg',
                'status' => 'menunggu',
                'kategori' => 'Makanan',
                'created_at' => Carbon::now()->subDays(2),
                'slug' => 'tani-hidroponik-maju-' . Str::random(6)
            ],
            [
                'nama_pemilik' => 'Rina Wati',
                'nik' => '3509101234567897',
                'nama_usaha' => 'Rajut Cantik',
                'jenis_produk' => 'Produk Rajutan',
                'deskripsi' => 'Membuat berbagai produk rajutan handmade seperti tas, dompet, topi, dan aksesoris lainnya. Menggunakan bahan berkualitas dengan desain modern. Menerima pesanan custom sesuai keinginan pelanggan.',
                'harga_minimum' => 50000,
                'harga_maximum' => 500000,
                'whatsapp' => '081234567897',
                'email' => 'rajut.cantik@gmail.com',
                'alamat' => 'Jl. Teratai No. 17, Dusun Barat',
                'foto_usaha' => 'rajut-cantik.jpg',
                'status' => 'ditolak',
                'catatan_status' => 'Foto produk kurang jelas dan deskripsi produk perlu dilengkapi',
                'kategori' => 'Fashion',
                'created_at' => Carbon::now()->subDays(1),
                'slug' => 'rajut-cantik-' . Str::random(6)
            ]
        ];

        foreach ($umkm as $data) {
            UMKM::create($data);
        }
    }
}
