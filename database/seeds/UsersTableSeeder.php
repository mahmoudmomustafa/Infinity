<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Faker\Factory;

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
        $faker = Factory::create();
        // generate 3 users
        DB::table('users')->insert([
            [
                'name' => 'Joe Doe',
                'slug' => 'joe-doe',
                'bio' => $faker->text(rand(255,300)),
                'email' => 'john@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Jane Doe',
                'slug' => 'jane-doe',
                'bio' => $faker->text(rand(255,300)),
                'email' => 'jane@test.com',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Saitama',
                'slug' => 'saitama',
                'bio' => $faker->text(rand(255,300)),
                'email' => 'saitama@test.com',
                'password' => bcrypt('secret')
            ]
        ]);
    }
}
