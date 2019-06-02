<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'title' => 'web Design',
                'slug' => 'web-design',
            ],
            [
                'title' => 'web Programming',
                'slug' => 'web-web-programming',
            ],
            [
                'title' => 'Internet',
                'slug' => 'internet',
            ],
            [
                'title' => 'Social Media',
                'slug' => 'social-media',
            ],
            [
                'title' => 'Photography',
                'slug' => 'photography',
            ]
        ]);
    }
}
