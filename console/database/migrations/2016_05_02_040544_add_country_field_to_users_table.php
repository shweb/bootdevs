<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adding Country field into table
       Schema::table('users', function(Blueprint $table)
       {
         $table->string('country');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Reverting country from table
        Schema::table('users', function(Blueprint $table)
        {
          $table->dropColumn('country');
        });
    }
}
