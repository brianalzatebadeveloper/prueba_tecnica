<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('services', function (Blueprint $table){
          $table->increments('id');
          $table->string('name',255)->nullable();
          $table->string('title',200)->nullable();
          $table->string('text_intro',500)->nullable();
          $table->text('text')->nullable();
          $table->string('image',255)->nullable();
          $table->string('icon',255)->nullable();
          $table->string('title_image',255)->nullable();
          $table->string('alt_image',255)->nullable();
          $table->integer('featured')->nullable();
          $table->integer('position_order')->nullable();
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
        Schema::dropIfExists('services');
    }
}
