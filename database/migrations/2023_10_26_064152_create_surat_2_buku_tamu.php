<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurat2BukuTamu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_2_buku_tamu', function (Blueprint $table) {
            $table->id('id_surat_2');
            $table->unsignedBigInteger('id_surat_1');
            $table->unsignedBigInteger('id_tamu');
            $table->unsignedBigInteger('id_ga');
            $table->unsignedBigInteger('id_status_surat');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_periode');
            $table->string('kode_unik', 10);
            $table->timestamps();

            // Definisi kunci asing
            $table->foreign('id_surat_1')->references('id_surat_1')->on('surat_1_buku_tamu');
            $table->foreign('id_tamu')->references('id_tamu')->on('data_diri_buku_tamu');
            $table->foreign('id_ga')->references('id_user')->on('users');
            $table->foreign('id_status_surat')->references('id_status_surat')->on('status_surat');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi_tujuan');
            $table->foreign('id_periode')->references('id_periode')->on('periode_tamu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_2_buku_tamu');
    }
}
