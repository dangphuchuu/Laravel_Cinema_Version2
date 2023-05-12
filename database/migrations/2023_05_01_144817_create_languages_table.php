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
        Schema::create('audio', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('audio', 255);
            $table->timestamps();
        });
        Schema::create('sub', function (Blueprint $table) {
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
        Schema::dropIfExists('audio');
        Schema::dropIfExists('sub');
    }
};
