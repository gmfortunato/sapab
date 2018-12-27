<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->integer('place_kina')->unsigned();
            $table->integer('place_kena')->unsigned();
            $table->integer('card_kina')->unsigned();
            $table->integer('card_keno')->unsigned();
            $table->string('kina');
            $table->string('keno');
            $table->string('price');

            $table->foreign('place_kina')->references('id')->on('places');
            $table->foreign('place_kena')->references('id')->on('places');

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
        Schema::dropIfExists('lottery');
    }
}
