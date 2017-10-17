<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();

            $table->string('email')->nullable();
            $table->string('contact_num')->nullable();

            $table->integer('capacity')->nullable();

            $table->boolean('wheelchair_access')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('trains')->default(false);
            $table->boolean('trams')->default(false);
            $table->boolean('busses')->default(false);
            $table->boolean('taxi_uber')->default(false);
            $table->boolean('restaurants')->default(false);
            $table->boolean('pubs')->default(false);

            $table->string('website_url');
            $table->timestamps();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users_ticksols')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venues');
    }
}
