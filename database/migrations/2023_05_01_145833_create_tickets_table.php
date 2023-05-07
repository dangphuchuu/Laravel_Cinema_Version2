<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Schedule;
use \App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('schedule_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('user_id')->references("id")->on('users');
            $table->text('qrcode');
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
        Schema::dropIfExists('tickets');
    }
};
