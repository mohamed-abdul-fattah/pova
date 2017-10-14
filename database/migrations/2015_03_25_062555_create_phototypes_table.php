<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class createphototypestable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('phototypes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->boolean('multi');
			$table->string('mdlname');
			$table->boolean('required')->default(0);
			$table->integer('minWidth')->default(0);
			$table->integer('maxWidth')->default(0);
			$table->integer('minHeight')->default(0);
			$table->integer('maxHeight')->default(0);
			$table->integer('minSize')->default(0);
			$table->integer('maxSize')->default(0);
			$table->string('extensions')->default(0);
			$table->integer('thumbWidth')->default(0);
			$table->integer('thumbHeight')->nullable();
            $table->string('caption')->nullable();
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
		Schema::drop('phototypes');
	}

}
