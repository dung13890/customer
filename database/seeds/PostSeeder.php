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
        if (App::environment('local')) {
            factory(Post::class, 50)->create();
        }
    }
}
