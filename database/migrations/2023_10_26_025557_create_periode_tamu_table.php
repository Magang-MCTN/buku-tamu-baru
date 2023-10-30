<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_tamu', function (Blueprint $table) {
            $table->id('id_periode');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->timestamp('jam_kedatangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periode_tamu');
    }
}
