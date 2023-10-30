<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurat1BukuTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_1_buku_tamu', function (Blueprint $table) {
            $table->id('id_surat_1');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_periode');
            $table->unsignedBigInteger('id_status_surat');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_tamu', 255);
            $table->string('asal_perusahaan', 255);
            $table->string('email_tamu', 255);
            $table->integer('no_hp_tamu');
            $table->string('tujuan_keperluan', 255)->nullable();
            $table->string('nama_pic', 255);
            $table->string('email_pic', 255);
            $table->timestamps();

            // Tambahkan foreign key constraints
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi_tujuan');
            $table->foreign('id_periode')->references('id_periode')->on('periode_tamu');
            $table->foreign('id_status_surat')->references('id_status_surat')->on('status_surat');
            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_1_buku_tamu');
    }
}
