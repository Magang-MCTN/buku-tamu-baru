<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPengawalanToSurat1BukuTamuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_1_buku_tamu', function (Blueprint $table) {
            $table->string('pengawalan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_1_buku_tamu', function (Blueprint $table) {
            $table->dropColumn(['pengawalan']);
        });
    }
}
