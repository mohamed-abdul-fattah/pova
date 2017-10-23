<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('prices')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_pricestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_pricestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Prices',
			'route' => 'prices',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
