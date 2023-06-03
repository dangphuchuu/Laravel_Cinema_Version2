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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('room_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('audio_id')->unsigned();
            $table->bigInteger('sub_id')->unsigned();
            $table->foreign("room_id")->references("id")->on("rooms");
            $table->foreign("movie_id")->references("id")->on("movies");
            $table->foreign('audio_id')->references('id')->on('audios');
            $table->foreign('sub_id')->references('id')->on('subs');
            $table->date("date");
            $table->time('time');
            $table->boolean('early')->default(false);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('schedules');
    }
};
