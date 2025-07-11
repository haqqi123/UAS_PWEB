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
        'petani',
        'nelayan',
        'wiraswasta',
        'pekerjaan_lain',
        'jumlah_kk',
    ];
}
