<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableEndAavailablities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('availabilities', function (Blueprint $table) {
            $table->dropColumn('end');
        });
        Schema::table('availabilities', function (Blueprint $table) {
            $table->date('end')->nullable()->after('start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('availabilities', function (Blueprint $table) {
            $table->dropColumn('end');
        });
        Schema::table('availabilities', function (Blueprint $table) {
            $table->date('end')->after('start')->default(Carbon::now());
        });
    }
}
