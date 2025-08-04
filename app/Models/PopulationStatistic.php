<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationStatistic extends Model
{
    use HasFactory;
    protected $table = 'population_statistics';
    protected $fillable = [
        'total_penduduk',
        'anak',
        'remaja',
        'dewasa',
        'lansia',
        'laki_laki',
        'perempuan',
        'jumlah_kk',
        'petani',
        'perkebunan',
        'perdagangan',
        'pegawai_negeri_sipil',
        'pegawai_swasta',
        'buruh_tani',
        'pengrajin',
        'tukang_kayu',
        'batu',
        'polri',
        'tni',
        'jasa'
    ];
}
