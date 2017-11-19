<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AbilitySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
