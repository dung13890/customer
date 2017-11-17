<?php

use Illuminate\Database\Seeder;
use App\Eloquent\User;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abilities = [
            'role-read', 'role-write',
            'user-read', 'user-write',
            'category-read', 'category-write',
            'contact-read', 'contact-write',
            'config-read', 'config-write',
            'menu-read', 'menu-write',
            'page-read', 'page-write',
            'post-read', 'post-write',
            'product-read', 'product-write',
            'slide-read', 'slide-write',
        ];
        foreach ($abilities as $ability) {
            Bouncer::ability(['name' => $ability])->save();
        }
        Bouncer::allow('admin')->to($abilities);
    }
}
