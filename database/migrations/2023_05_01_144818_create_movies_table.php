<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Language;
use \App\Models\Rated;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->date('birthday');
            $table->string('national', 255);
            $table->string('content', 255);
            $table->timestamps();
        });
        Schema::create('cast', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->text('image');
            $table->date('birthday');
            $table->string('national', 255);
            $table->string('content', 255);
            $table->timestamps();
        });
        Schema::create('movies', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->integer('runningTime');
            $table->date('releaseDate');
            $table->bigInteger('director_id')->unsigned();
            $table->bigInteger('cast_id')->unsigned();
            $table->string('description', 255);
            $table->bigInteger('rated_id')->unsigned();
            $table->foreign('rated_id')->references('id')->on('rated');
            $table->foreign('director_id')->references('id')->on('director');
            $table->foreign('cast_id')->references('id')->on('cast');
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
        Schema::dropIfExists('movies');
        Schema::dropIfExists('director');
        Schema::dropIfExists('cast');
    }
};
