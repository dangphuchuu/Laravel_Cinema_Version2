<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\RoomType;
use \App\Models\Theater;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 255);
            $table->bigInteger('room_type_id')->unsigned();
            $table->bigInteger('theater_id')->unsigned();
            $table->foreign('room_type_id')->references('id')->on('room_types');
            $table->foreign('theater_id')->references('id')->on('theaters');
            $table->timestamps();


//            $table->foreign('products_id')->references('id')->on('products')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
