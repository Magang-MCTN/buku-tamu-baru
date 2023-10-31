<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSurat1ToKendaraanBukuTamu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraan_buku_tamu', function (Blueprint $table) {
            $table->unsignedBigInteger('id_surat_1');
            $table->foreign('id_surat_1')->references('id_surat_1')->on('surat_1_buku_tamu');
        });
    }

    public function down()
    {
        Schema::table('kendaraan_buku_tamu', function (Blueprint $table) {
            $table->dropForeign(['id_surat_1']);
            $table->dropColumn('id_surat_1');
        });
    }
}
