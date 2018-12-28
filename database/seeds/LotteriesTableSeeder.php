<?php

use App\Models\Lottery;
use Illuminate\Database\Seeder;

class LotteriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$places = \App\Models\Place::all();

        factory(App\Models\Lottery::class,15)->create();
           /* ->create()
            ->each(function (Lottery $lottery) use($places){
                $place = $places->random(20);

            });*/
    }
}
