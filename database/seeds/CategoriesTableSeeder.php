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
        //update posts
        // for ($post_id = 0; $post_id <= 10; $post_id++) {

        //     $category_id = rand(1, 5);

        //     DB::table('posts')
        //         ->where('id', $post_id)
        //         ->update(['category_id' => $category_id]);
        // }
    }
}
