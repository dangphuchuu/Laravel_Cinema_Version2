<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats_type', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });
        Schema::create('seats', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('row', 255);
            $table->integer('col');
            $table->bigInteger('seats_type_id')->unsigned();
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('seats_type_id')->references('id')->on('seats_type');
            $table->string('status');
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
        Schema::dropIfExists('seats');
    }
};
