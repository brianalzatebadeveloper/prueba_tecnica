<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook',300)->nullable();
            $table->string('twitter',300)->nullable();
            $table->string('in_web',1000)->nullable();
            $table->string('instagram',1000)->nullable();
            $table->string('googleplus',1000)->nullable();
            $table->string('youtube',300)->nullable();
            $table->string('latitude',50)->nullable();
            $table->string('longitude',50)->nullable();
            $table->string('key_map')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('url')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
