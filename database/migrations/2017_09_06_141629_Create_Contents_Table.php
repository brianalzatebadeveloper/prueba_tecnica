<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',300);
            $table->text('text')->nullable();
            $table->text('text_2')->nullable();
            $table->text('text_3')->nullable();
            $table->text('text_4')->nullable();
            $table->string('image',250)->nullable();
            $table->string('image_2',250)->nullable();
            $table->string('image_3',250)->nullable();
            $table->string('image_4',250)->nullable();
            $table->string('title_image',200)->nullable();
            $table->string('alt_image',200)->nullable();
            $table->string('title_image2',200)->nullable();
            $table->string('alt_image2',200)->nullable();
            $table->string('title_image3',200)->nullable();
            $table->string('alt_image3',200)->nullable();
            $table->string('title_image4',200)->nullable();
            $table->string('alt_image4',200)->nullable();
            $table->string('url',400)->nullable();
            $table->string('url_2',400)->nullable();

            $table->integer('section_id')->unsigned();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

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
        Schema::dropIfExists('contents');
    }
}
