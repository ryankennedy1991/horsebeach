<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBeginTimeAndEndTimeColumnsFromEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function($table){
            $table->dropColumn('event_time_begin');
            $table->dropColumn('event_time_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function($table){
            $table->time('event_time_begin');
            $table->time('event_time_end');
        });
    }
}
