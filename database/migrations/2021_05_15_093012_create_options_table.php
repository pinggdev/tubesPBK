<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('kuis_id');
            // $table->foreign('kuis_id')->references('id')->on('kuis');
            $table->foreignId('kuis_id')->constrained('kuis');
            $table->longText('option');
            $table->integer('points')->nullable();
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
        Schema::dropIfExists('options');
    }
}
