<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Combo;
use \App\Models\Food;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_detail', function (Blueprint $table) {
            $table->bigInteger('combo_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();
            $table->foreign('combo_id')->references('id')->on('combos');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('combo_detail');
    }
};
