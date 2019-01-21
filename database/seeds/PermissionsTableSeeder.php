<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'manage_contents',
                'guard_name' => 'admin',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'manage_users',
                'guard_name' => 'admin',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'edit_settings',
                'guard_name' => 'admin',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'manage_permissions',
                'guard_name' => 'admin',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'permissions_edit',
                'guard_name' => 'admin',
            ),
            5 => 
            array (
                'id' => 21,
                'name' => 'Administrator',
                'guard_name' => 'admin',
            ),
            6 => 
            array (
                'id' => 11,
                'name' => 'manage_users',
                'guard_name' => 'admin',
            ),
            7 => 
            array (
                'id' => 19,
                'name' => 'manage_roles',
                'guard_name' => 'admin',
            ),
        ));
        
        
    }
}