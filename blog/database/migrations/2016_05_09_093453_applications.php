<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('domainname');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('select2_applang_checked');
            $table->string('select2_applang');
            $table->string('codepath');
            $table->string('select2_gitrepo_checked');
            $table->string('select2_gitrepo');
            $table->string('gitusername');
            $table->string('select2_appmonitor_checked');
            $table->string('select2_appmonitor');
            $table->string('key');
            $table->string('remarks');
            
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
        //
        Schema::drop('applications');
    }
}
