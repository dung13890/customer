<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = app(App\Eloquent\Category::class)->where('type', 'article');
        if (App::environment('local')) {
            factory(Product::class, 50)->create()->each(function ($item) use ($categories) {
                $item->categories()->attach($categories->pluck('id')->random(4)->all());
            });
        }
    }
}
