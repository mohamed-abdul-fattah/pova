<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('features')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_featurestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_featurestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Features',
			'route' => 'features',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
