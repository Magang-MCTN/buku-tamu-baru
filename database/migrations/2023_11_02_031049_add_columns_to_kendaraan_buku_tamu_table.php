<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToKendaraanBukuTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraan_buku_tamu', function (Blueprint $table) {
            $table->string('tipe_mobil');
            $table->string('warna');
            $table->string('nomor_polisi');
            $table->string('masa_berlaku_stnk');
            $table->string('foto_stnk');
        });
    }

    public function down()
    {
        Schema::table('kendaraan_buku_tamu', function (Blueprint $table) {
            $table->dropColumn(['tipe_mobil', 'warna', 'nomor_polisi', 'masa_berlaku_stnk', 'foto_stnk']);
        });
    }
}
