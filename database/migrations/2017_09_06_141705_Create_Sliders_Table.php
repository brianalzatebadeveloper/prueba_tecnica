<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image',255)->nullable();
            $table->string('image_responsive',255)->nullable();
            $table->string('title_image',250)->nullable();
            $table->string('alt_image',250)->nullable();
            $table->string('title_image2',250)->nullable();
            $table->string('alt_image2',250)->nullable();
            $table->string('title',500)->nullable();
            $table->text('text')->nullable();
            $table->string('url',1000)->nullable();
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
        Schema::dropIfExists('sliders');
    }
}
