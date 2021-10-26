<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('level_education');
            $table->string('serie');
            $table->string('shift');

            $table->unsignedBigInteger('school_id')->nullable();
            $table->index('school_id');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');

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
        Schema::dropIfExists('class_rooms');
    }
}
