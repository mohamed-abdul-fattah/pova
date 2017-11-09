<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('categories')->truncate();

		DB::table('permissions')->insert([
              'name' => 'index_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'show_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'create_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'store_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'edit_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'update_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'destroy_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchedit_categoriestableseeders',
              'guard_name' => 'web'
          ]
          ,[
              'name' => 'batchupdate_categoriestableseeders',
              'guard_name' => 'web'
          ]
          );

		DB::table('nav_items')->insert([
			'name' => 'Categories',
			'route' => 'categories',
			'icon' => '',
			'nav_id' => '1'
		]);
	}

}
