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
        Schema::create('ticket_combo', function (Blueprint $table) {
            $table->bigInteger('ticket_id')->unsigned();
            $table->bigInteger('combo_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('combo_id')->references('id')->on('combos');
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
        Schema::dropIfExists('ticket_combo');
    }
};
