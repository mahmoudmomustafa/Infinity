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
                'slug' => 'joe-doe',
                'email' => 'john@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Jane Doe',
                'slug' => 'jane-doe',
                'email' => 'jane@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Saitama',
                'slug' => 'saitama',
                'email' => 'saitama@test.com',
                'password' => bcrypt('secret')
            ]
        ]);
    }
}
