<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->integer('number')->unsigned();
            $table->string('kina');
            $table->string('keno');
            $table->string('price');
            $table->integer('place_kina')->unsigned();
            $table->integer('place_keno')->unsigned();
            $table->integer('card_kina')->unsigned();
            $table->integer('card_keno')->unsigned();

            $table->foreign('place_kina')->references('id')->on('places');
            $table->foreign('place_keno')->references('id')->on('places');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('lotteries');
    }
}
