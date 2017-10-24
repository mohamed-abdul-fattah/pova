<?php

use Illuminate\Database\Seeder;

class AvailabilitiesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('availabilities')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_availabilitiestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Availabilities',
			'route' => 'availabilities',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
