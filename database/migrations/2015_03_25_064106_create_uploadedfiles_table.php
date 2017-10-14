<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class createuploadedfilestable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uploadedfiles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('filable_type');
			$table->integer('filable_id')->unsigned();
			$table->integer('filetype_id')->unsigned();
			$table->string('link');
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
		Schema::drop('uploadedfiles');
	}

}
