<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSubmissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_submission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained('submission');
            $table->foreignId('user_id')->constrained('users');
            $table->string('file');
            $table->integer('lanjut')->default(0);
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
        Schema::dropIfExists('hasil_submission');
    }
}
