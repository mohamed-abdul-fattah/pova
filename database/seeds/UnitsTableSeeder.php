<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('units')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_unitstableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_unitstableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Units',
			'route' => 'units',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
