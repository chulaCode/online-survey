<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inst_id')->nullable();
            $table->string('ccode');
            $table->unsignedBigInteger('dept_id')->nullable();
            $table->unsignedBigInteger('semester_id')->nullable();
            $table->string('cname');
            $table->string('image');
            $table->integer('credit');
            $table->integer('max_num');

            $table->timestamps();

            $table->index('inst_id');
            $table->index('dept_id');
            $table->index('semester_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
