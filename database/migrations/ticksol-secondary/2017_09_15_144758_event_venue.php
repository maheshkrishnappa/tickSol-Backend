<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventVenue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_venue', function (Blueprint $table) {
            $table->date('conduct_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();

            $table->unsignedInteger('venue_id');
            $table->foreign('venue_id')
                ->references('id')
                ->on('venues')
                ->onDelete('cascade');

            $table->unsignedInteger('event_id');
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->primary(['conduct_date', 'start_time', 'venue_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_venue');
    }
}
