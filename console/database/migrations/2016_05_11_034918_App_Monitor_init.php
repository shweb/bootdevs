<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppMonitorInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_monitors', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('app_id');
	    $table->string('vendor');
            $table->string('app_key');
            $table->string('email');
            $table->string('username');            
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
        Schema::drop('app_monitors');
    }
}
