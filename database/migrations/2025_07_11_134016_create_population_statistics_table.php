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
            $table->integer('petani');
            $table->integer('nelayan');
            $table->integer('wiraswasta');
            $table->integer('pekerjaan_lain');
            $table->integer('jumlah_kk');
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
