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
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('directors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->date('birthday');
            $table->string('national', 255);
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('casts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->date('birthday');
            $table->string('national', 255);
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->time('showTime');
            $table->date('releaseDate');
            $table->date('endDate');
            $table->bigInteger('director_id')->unsigned();
            $table->bigInteger('cast_id')->unsigned();
            $table->string('description', 255);
            $table->bigInteger('rating_id')->unsigned();
            $table->foreign('rating_id')->references('id')->on('rating');
            $table->foreign('director_id')->references('id')->on('directors');
            $table->foreign('cast_id')->references('id')->on('casts');
            $table->boolean('upcomming')->default(true);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('movie_genres_movies', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('movie_genres_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('movie_genres_id')->references('id')->on('movie_genres');
            $table->timestamps();
        });

        Schema::create('audios', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('audio', 255);
            $table->timestamps();
        });

        Schema::create('subs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('sub', 255);
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
        Schema::dropIfExists('movie_genres_movies');
        Schema::dropIfExists('movie_genres');
        Schema::dropIfExists('movies');
        Schema::dropIfExists('directors');
        Schema::dropIfExists('casts');
        Schema::dropIfExists('audios');
        Schema::dropIfExists('subs');
    }
};
