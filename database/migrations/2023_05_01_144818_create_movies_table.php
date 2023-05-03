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
        Schema::create('movies', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->integer('runningTime');
            $table->date('releaseDate');
            $table->string('director', 255);
            $table->string('cast', 255);
            $table->string('description', 255);
            $table->foreignIdFor(Language::class, 'language_id');
            $table->foreignIdFor(Rated::class, 'rated_id');
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
    }
};
