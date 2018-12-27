<?php

use Illuminate\Database\Seeder;

class LotteryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Lottery::class, 50)->create();
    }
}
