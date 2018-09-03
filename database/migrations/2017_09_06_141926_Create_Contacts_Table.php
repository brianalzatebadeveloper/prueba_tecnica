<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('city')->nullable();
            $table->text('message')->nullable();
            $table->string('section')->nullable();
            $table->string('url',1000)->nullable();
            $table->string('url2',1000)->nullable();
            $table->integer('status');
            $table->integer('notification');
            $table->integer('plan_id')->unsigned()->nullable();

            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

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
        Schema::dropIfExists('contacts');
    }
}
