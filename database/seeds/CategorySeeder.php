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
            $categories = factory(Category::class, 10)->create();
            $postCategories = app(Category::class)->where('type', 'post')->where('parent_id', 0)->get();
            $productCategories = app(Category::class)->where('type', 'product')->where('parent_id', 0)->get();
            factory(Category::class, 40)->create()->each(function ($category) use ($postCategories, $productCategories) {
                if ($category->type == 'post') {
                    $category->update(['parent_id' => $postCategories->pluck('id')->random()]);
                }
                if ($category->type == 'product') {
                    $category->update(['parent_id' => $productCategories->pluck('id')->random()]);
                }
            });
        }
    }
}
