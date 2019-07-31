<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Post;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //path data throw every view
        view()->composer('layouts.sidebar',function($view){
            $categories = Category::orderBy('title','asc')->get();
            return $view->with('categories',$categories);
        });

        view()->composer('layouts.sidebar',function($view){
            $popularPosts = Post::popular()->take(3)->get();
            return $view->with('popularPosts',$popularPosts);
        });
    }
}
