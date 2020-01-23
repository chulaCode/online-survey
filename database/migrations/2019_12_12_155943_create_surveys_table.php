<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ccode');
            $table->unsignedBigInteger('studentNo');
            $table->unsignedBigInteger('ques_id');
            $table->integer('answer');
            $table->integer('section');
            $table->timestamps();
            $table->index('c_code');
            $table->index('studentNo');
            $table->index('ques_id');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
