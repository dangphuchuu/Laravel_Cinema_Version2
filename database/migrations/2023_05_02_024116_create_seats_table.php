<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seat_types', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->integer('price');
            $table->string('color');
            $table->timestamps();
        });
        Schema::create('seats', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('row', 255);
            $table->integer('col');
            $table->bigInteger('seat_type_id')->unsigned();
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('seat_type_id')->references('id')->on('seat_types');
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
        Schema::dropIfExists('seat_types');

    }
};
