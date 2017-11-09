<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('cities')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_citiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_citiestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Cities',
			'route' => 'cities',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
