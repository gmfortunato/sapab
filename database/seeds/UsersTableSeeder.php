<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gustavo Mello',
            'email' => 'contato@velosite.com.br',
            'password' => bcrypt('temp123'),
        ]);

        factory(\App\Models\User::class, 9)->create();
    }
}
