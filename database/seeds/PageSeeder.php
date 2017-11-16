<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            factory(Page::class, 50)->create();
        }
    }
}
