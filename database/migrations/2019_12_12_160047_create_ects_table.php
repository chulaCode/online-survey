<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ccode');
            $table->integer('number');
            $table->integer('duration');
            $table->integer('workload');
            $table->string('activities')->nullable();

            $table->timestamps();
            $table->index('ccode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ects');
    }
}
