<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = app(App\Eloquent\Category::class)->where('type', 'product');
        if (App::environment('local')) {
            factory(Post::class, 50)->create()->each(function ($item) use ($categories) {
                $item->categories()->attach($categories->pluck('id')->random(4)->all());
            });
        }
    }
}
