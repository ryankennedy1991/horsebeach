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
            $table->increments('id');
            $table->string('event_title');
            $table->string('location');
            $table->dateTime('event_begin');
            $table->time('event_time_begin');
            $table->dateTime('event_end');
            $table->time('event_time_end');
            $table->text('description');
            $table->float('fee');
            $table->boolean('confirmed');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
