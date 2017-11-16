<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Slide;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            factory(Slide::class, 5)->create();
        }
    }
}
