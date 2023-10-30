<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_surat', function (Blueprint $table) {
            $table->id('id_status_surat');
            $table->string('nama_status_surat', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_surat');
    }
}
