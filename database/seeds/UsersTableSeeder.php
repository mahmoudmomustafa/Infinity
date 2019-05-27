<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //rest user table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users
        DB::table('users')->insert([
            [
                'name' => 'Joe Doe',
                'email' => 'john@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Saitama',
                'email' => 'saitama@test.com',
                'password' => bcrypt('secret')
            ]
        ]);
    }
}
