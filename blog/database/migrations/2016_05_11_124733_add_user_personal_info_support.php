<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserPersonalInfoSupport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adding personal info into table
       Schema::table('users', function(Blueprint $table)
       {
         $table->string('phone'); //In terms of RMB
         $table->longtext('about');
         $table->string('website');
         $table->string('nickname');
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
    }
}
