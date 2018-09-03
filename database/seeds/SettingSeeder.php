<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('settings')->insert([
    		'facebook' => 'https://www.facebook.com/',
    		'twitter' => 'https://twitter.com/',
    		'in_web' => '',
    		'youtube' => 'https://www.youtube.com',
    		'googleplus' => 'https://plus.google.com/',
    		'latitude' => '6.204170622369918',
    		'longitude' => '-75.57193636894226',
    		'key_map' => 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC_nuq-hjfS1Q2RzDUa8TooiEVe6neTWsw',
    		'contact_email' => 'brianalzate97@gmail.com',
    		'url' => '',
    		'address' => '',
    		'phone' => '',
    		'cellphone' => ''
    	]);

        // factory(App\Contact::class, 50)->create();
        
    }
}
