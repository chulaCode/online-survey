<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('first_surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ccode');
            $table->unsignedBigInteger('studentNo');
            $table->unsignedBigInteger('ques_id');
            $table->integer('answer');
            $table->integer('section');
            $table->timestamps();
            $table->index('ccode');
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
        Schema::dropIfExists('first_surveys');
    }
}
