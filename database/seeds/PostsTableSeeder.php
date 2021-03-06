<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Post;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //rest post table
        DB::table('posts')->truncate();

        // generate 10 dummy posts
        $posts = [];
        $faker = Factory::create();
        for ($i=1; $i <=10 ; $i++) { 
            $image = 'Post_image_' . rand(1,5) . '.jpg';
            $category_id = rand(1, 5);
            $posts[] = [
                'author_id' => rand(1,3),
                'title' => $faker->sentence(rand(8,12)),
                'excerpt' => $faker->text(rand(250,300)),
                'description' => $faker->paragraphs(rand(10,15),true),
                'slug' => $faker->slug(),
                'image' => rand(0,1) == 1 ? $image : Null,
                'category_id' => $category_id,
                'view_count' => rand(1,10) * 10
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
