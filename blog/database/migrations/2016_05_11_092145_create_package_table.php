<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bootdev_packages', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('name');
	    $table->longtext('metadata'); //Describe what is included in the package
            $table->string('charge_method'); //Monthly, onDemand
            $table->integer('charge_amount');
            $table->timestamps();
        });

        DB::table('bootdev_packages')->insert(
            array(
                 array(
		   'name' => 'professional 1',
		   'charge_method' => '1month',
                   'charge_amount' => '500'
		 ),
                 array(
		   'name' => 'professional 2',
		   'charge_method' => '3month',
                   'charge_amount' => '1200'
		 ),
                 array(
		   'name' => 'professional 3',
		   'charge_method' => '6month',
                   'charge_amount' => '2100'
		 ),
                 array(
		   'name' => 'onDemand',
		   'charge_method' => 'peraction',
                   'charge_amount' => '15'
		 ),
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bootdev_packages');
    }
}
