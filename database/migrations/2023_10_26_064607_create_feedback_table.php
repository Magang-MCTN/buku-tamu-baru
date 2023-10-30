<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('id_feedback');
            $table->integer('nilai_feedback');
            $table->text('feedback');
            $table->unsignedBigInteger('id_periode');
            $table->timestamps();

            // Definisi kunci asing
            $table->foreign('id_periode')->references('id_periode')->on('periode_tamu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
