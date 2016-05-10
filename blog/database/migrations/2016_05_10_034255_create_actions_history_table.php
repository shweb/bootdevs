<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions_history', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	    $table->integer('user_id'); //for onetomany mappin in app/User.php
            $table->string('action_type');
            $table->string('type'); //History type
            $table->string('action_appname');
            $table->longText('action_desc');
            $table->string('action_status');
            $table->string('action_error');
            $table->string('action_log');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actions_history');
    }
}
