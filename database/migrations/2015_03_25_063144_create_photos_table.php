<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class createphotostable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable();
			$table->string('altname')->nullable();
			$table->string('link');
			$table->integer('imagable_id')->unsinged();
			$table->string('imagable_type');
			$table->integer('phototype_id')->unsigned();
			$table->boolean('cover')->default(0);
			$table->string('thumb_link')->nullable();
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
		Schema::drop('photos');
	}

}
