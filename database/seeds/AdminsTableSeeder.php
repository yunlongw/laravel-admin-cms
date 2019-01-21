<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->delete();
        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'administration',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$77s74ceBEd8HPrXlp0Ymd.XSDnhPA8fRdqTj34P5Lv.SooJGZ3js6',
                'remember_token' => 'oCUzlgDl0FS4JVAHAVvwDgjsmhsMG49nnuIqrAffiM56NwKGvMV8Cv37xTdo',
            ),
        ));


    }
}
