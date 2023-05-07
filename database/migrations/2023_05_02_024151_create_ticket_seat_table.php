<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Ticket;
use App\Models\Seat;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_seat', function (Blueprint $table) {
            $table->bigInteger('ticket_id')->unsigned();
            $table->bigInteger('seat_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->foreign('seat_id')->references('id')->on('seats');
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
        Schema::dropIfExists('ticket_seat');
    }
};
