<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('resources')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_resourcestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_resourcestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Resources',
			'route' => 'resources',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
