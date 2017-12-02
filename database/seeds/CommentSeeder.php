<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->truncate();
        if (App::environment('local')) {
            factory(Comment::class, 50)->create();
        }
    }
}
