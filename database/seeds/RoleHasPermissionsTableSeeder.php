<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 2,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 7,
            ),
            2 => 
            array (
                'permission_id' => 1,
                'role_id' => 9,
            ),
            3 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            4 => 
            array (
                'permission_id' => 2,
                'role_id' => 9,
            ),
            5 => 
            array (
                'permission_id' => 3,
                'role_id' => 9,
            ),
            6 => 
            array (
                'permission_id' => 8,
                'role_id' => 9,
            ),
            7 => 
            array (
                'permission_id' => 9,
                'role_id' => 9,
            ),
            8 => 
            array (
                'permission_id' => 19,
                'role_id' => 9,
            ),
        ));
        
        
    }
}