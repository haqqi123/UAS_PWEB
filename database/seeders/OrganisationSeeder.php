<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organisation;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organisations = [
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Kepala Desa',
                'foto' => 'organisasi/budi.jpg',
            ],
            [
                'nama' => 'Siti Aminah',
                'jabatan' => 'Sekretaris Desa',
                'foto' => 'organisasi/siti.jpg',
            ],
            [
                'nama' => 'Joko Purnomo',
                'jabatan' => 'Bendahara',
                'foto' => 'organisasi/joko.jpg',
            ],
            [
                'nama' => 'Dewi Lestari',
                'jabatan' => 'Kasi Pelayanan',
                'foto' => 'organisasi/dewi.jpg',
            ],
        ];
        foreach ($organisations as $org) {
            Organisation::create($org);
        }
    }
}
