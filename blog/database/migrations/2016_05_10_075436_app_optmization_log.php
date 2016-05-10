<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppOptmizationLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_optmization_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entry');
            //$table->integer('app_id'); // an optmization should belongs to an app, and this app contains many actions
            $table->string('type');
            $table->string('action_id'); // After this action, how many % of improvement, in terms of 4 items below
            $table->string('response_time');
            $table->string('request_per_sec'); //Request per sec that can supports (Concurrent users)
            $table->string('bandwidth_per_request');
            $table->string('query_per_sec'); //QPS, for database measurement
            
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
        Schema::drop('app_optmization_log');
    }
}
