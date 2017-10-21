<?php

use Illuminate\Database\Seeder;

class AcquiredFeaturesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('acquired_features')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_acquiredfeaturestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'AcquiredFeatures',
			'route' => 'acquired-features',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
