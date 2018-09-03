<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
        	'name' => 'Eliana',
        	'lastname' => 'Soto Montoya',
        	'email' => 'eliana@gmail.com',
        	'tipo_doc' => 'cc',
        	'number_doc' => 1038410265,
        	'phone' => 3014375685,
        	'city' => 'Marinilla',
        	'address' => 'cl 29',
        	'password' => bcrypt('eliana'),
        	'role' => 2,
        	'type_member' => 1,
        	'status' => 1
        ]);
    }
}
