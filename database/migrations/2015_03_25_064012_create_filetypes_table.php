<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class createfiletypestable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filetypes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('mdlname');
			$table->integer('minSize')->default(0);
			$table->integer('maxSize')->default(0);
			$table->string('extentions')->nullable();
			$table->boolean('required')->default(0);
			$table->boolean('multi')->default(0);
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
		Schema::drop('filetypes');
	}

}
