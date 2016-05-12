<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adding amount field into table
       Schema::table('users', function(Blueprint $table)
       {
         $table->integer('credit_amount'); //In terms of RMB
         $table->integer('current_packageId'); 
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
