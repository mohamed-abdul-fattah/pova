<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('resource_id');
			$table->unsignedInteger('unit_id');
			$table->unsignedInteger('availability_id')->default(0);
			$table->float('price');
			$table->string('currency')->default('EGP');
			$table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
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
		Schema::drop('prices');
	}

}
