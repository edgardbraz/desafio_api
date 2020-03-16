<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->dateTime('datetime_begin');
            $table->dateTime('datetime_end');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('event_statuses');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('event_categories');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->integer('number');
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
        Schema::dropIfExists('events');
    }
}
