<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvailabilitiesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('availabilities', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('resource_id');
			$table->date('start');
			$table->date('end');
			$table->enum('type', ['unavailable', 'seasonal']);
			$table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
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
		Schema::drop('availabilities');
	}

}
