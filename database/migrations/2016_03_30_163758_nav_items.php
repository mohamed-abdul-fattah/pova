<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NavItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('route');
            $table->string('icon')->nullable();
            $table->integer('nav_id')->unsigned()->default(1);
            $table->integer('nav_item_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('nav_item_id')
                ->references('id')
                ->on('nav_items')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nav_id')
                ->references('id')
                ->on('navs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nav_items');
    }
}
