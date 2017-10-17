<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PluginUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plugin_user', function (Blueprint $table) {
            $table->timestamps();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users_ticksols')
                ->onDelete('cascade');

            $table->unsignedInteger('plugin_id');
            $table->foreign('plugin_id')
                ->references('id')
                ->on('plugins')
                ->onDelete('cascade');

            $table->primary(['user_id', 'plugin_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plugin_user');
    }
}
