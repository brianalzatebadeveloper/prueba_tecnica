<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Brian Alzate',
        	'email' => 'brianalzate97@gmail.com',
        	'password' => bcrypt('brian'),
        	'role' => 1

        ]);

        DB::table('users')->insert([
            'name' => 'Eliana Soto Montoya',
            'email' => 'eli1235bs@gmail.com',
            'password' => bcrypt('eli'),
            'role' => 2

        ]);

    }
}
