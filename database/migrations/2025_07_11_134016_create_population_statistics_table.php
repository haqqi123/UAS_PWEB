<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('population_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_penduduk');
            $table->integer('anak');
            $table->integer('remaja');
            $table->integer('dewasa');
            $table->integer('lansia');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->integer('jumlah_kk');
            $table->integer('petani');
            $table->integer('perkebunan');
            $table->integer('perdagangan');
            $table->integer('pegawai_negeri_sipil');
            $table->integer('pegawai_swasta');
            $table->integer('buruh_tani');
            $table->integer('pengrajin');
            $table->integer('tukang_kayu');
            $table->integer('batu');
            $table->integer('polri');
            $table->integer('tni');
            $table->integer('jasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('population_statistics');
    }
};
