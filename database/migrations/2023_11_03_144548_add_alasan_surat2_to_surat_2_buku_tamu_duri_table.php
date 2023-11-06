<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlasanSurat2ToSurat2BukuTamuDuriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_2_buku_tamu_duri', function (Blueprint $table) {
            $table->string('alasan_surat2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_2_buku_tamu_duri', function (Blueprint $table) {
            $table->dropColumn(['alasan_surat2']);
        });
    }
}
