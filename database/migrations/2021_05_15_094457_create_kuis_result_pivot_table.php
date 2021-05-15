<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisResultPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('kuis_result', function (Blueprint $table) {
            // $table->unsignedInteger('result_id');
            // $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->foreignId('result_id')->constrained('results')->onDelete('cascade');
            // $table->unsignedInteger('kuis_id');
            // $table->foreign('kuis_id')->references('id')->on('kuis')->onDelete('cascade');
            $table->foreignId('kuis_id')->constrained('kuis')->onDelete('cascade');
            // $table->unsignedInteger('option_id');
            // $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreignId('option_id')->constrained('options')->onDelete('cascade');
            $table->integer('points')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuis_result');
    }
}
