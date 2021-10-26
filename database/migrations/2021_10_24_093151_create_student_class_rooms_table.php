<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_class_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('class_room_id')->nullable();
            $table->index('class_room_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms')->onDelete('cascade');

            $table->unsignedBigInteger('student_id')->nullable();
            $table->index('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

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
        Schema::dropIfExists('student_class_rooms');
    }
}
