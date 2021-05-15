<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('kuis', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('kelas_id');
            // $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->longText('soal');
            $table->string('babkuis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuis');
    }
}
