<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UserSeeder::class);
    	$this->call(MemberSeeder::class);
        $this->call(SettingSeeder::class);
    	
        // $this->call(UsersTableSeeder::class);
    }
}
