<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(Category::class)->create([
            'name' => __('repositories.title.' . config('common.category.type')[0]),
            'type' => config('common.category.type')[0],
        ]);
        app(Category::class)->create([
            'name' => __('repositories.title.' . config('common.category.type')[1]),
            'type' => config('common.category.type')[1],
        ]);
        app(Category::class)->create([
            'name' => __('repositories.title.' . config('common.category.type')[2]),
            'type' => config('common.category.type')[2],
        ]);

        if (App::environment('local')) {
            $categories = factory(Category::class, 20)->create();
        }
    }
}
