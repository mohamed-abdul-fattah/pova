<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('features', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->enum('type', ['string', 'text', 'email', 'number', 'boolean', 'selection']);
			$table->boolean('required')->default(1);
			$table->string('selections', 400)->nullable();
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
		Schema::drop('features');
	}

}
