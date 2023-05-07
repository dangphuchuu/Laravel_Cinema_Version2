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
        Schema::create('movie_types_movies', function (Blueprint $table) {
            $table->bigInteger('movie_id')->unsigned();
            $table->bigInteger('movie_type_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on('movies');
            $table->foreign('movie_type_id')->references('id')->on('movie_types');
            $table->timestamps();
        });
    }

    /**g
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_types_movies');
    }
};
