<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => '财务主管',
                'guard_name' => 'admin',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => '财务',
                'guard_name' => 'admin',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => '管理员',
                'guard_name' => 'admin',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => '超级管理员',
                'guard_name' => 'admin',
            ),
            4 => 
            array (
                'id' => 10,
                'name' => 'Administrator',
                'guard_name' => 'admin',
            ),
        ));
        
        
    }
}