<?php namespace BaklySystems\Hydrogen\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class AddFirstRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     =>'Admin',
            'email'    =>'admin@example.com',
            'phone'    => '0',
            'password' => Hash::make('secret')
        ]);

        DB::table('roles')->insert([
            'name'       => 'Super Admin',
            'guard_name' =>'web',
        ]);

        $roleId = DB::table('roles')
            ->select('id')
            ->where('name', 'Super Admin')
            ->first()
            ->id;
        
        DB::table('model_has_roles')->insert([
            'role_id'    => $roleId,
            'model_id'   => 1,
            'model_type' => 'App\User',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'use_roles',
            'guard_name' =>'web',
        ]);
        DB::table('permissions')->insert([
            'name'       => 'use_permissions',
            'guard_name' =>'web',
        ]);
        DB::table('permissions')->insert([
            'name'       => 'use_phototypes',
            'guard_name' =>'web',
        ]);
        DB::table('permissions')->insert([
            'name'       => 'use_filetypes',
            'guard_name' =>'web',
        ]);
        DB::table('permissions')->insert([
            'name'       => 'use_impersonate',
            'guard_name' =>'web',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'use_users',
            'guard_name' =>'web',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'use_comments',
            'guard_name' =>'web',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'destroy_partners',
            'guard_name' =>'web',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'use_delete',
            'guard_name' =>'web',
        ]);

        //Adding Nav Items
        DB::table('navs')->insert([
            'name' => 'sidebar',
            'type' => 'sidebar'
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Home',
            'route'         => 'home',
            'nav_id'        => 1,
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'RBAC',
            'route'         => 'users',
            'nav_id'        => '1',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Users',
            'route'         => 'users',
            'nav_id'        => '1',
            'nav_item_id'   => '2',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Roles',
            'route'         => 'roles',
            'nav_id'        => '1',
            'nav_item_id'   => '2',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Permissions',
            'route'         => 'permissions',
            'nav_id'        => '1',
            'nav_item_id'   => '2',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Config',
            'route'         => 'phototypes',
            'nav_id'        => '1',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Phototypes',
            'route'         => 'phototypes',
            'nav_id'        => '1',
            'nav_item_id'   => '6',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Filetypes',
            'route'         => 'filetypes',
            'nav_id'        => '1',
            'nav_item_id'   => '6',
            'icon'          => '',
        ]);

        DB::table('nav_items')->insert([
            'name'          => 'Nav Items',
            'route'         => 'nav_items',
            'nav_id'        => '1',
            'nav_item_id'   => '6',
            'icon'          => '',
        ]);
    }
}
