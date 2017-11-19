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
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('roles')->truncate();
        \DB::table('abilities')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $abilities = [
            'role-read', 'role-create', 'role-edit', 'role-destroy',
            'user-read', 'user-create', 'user-edit', 'user-destroy',
            'category-read', 'category-create', 'category-edit', 'category-destroy',
            'contact-read', 'contact-destroy',
            'config-read', 'config-edit',
            'menu-read', 'menu-create', 'menu-edit', 'menu-destroy',
            'page-read', 'page-create', 'page-edit', 'page-destroy',
            'post-read', 'post-create', 'post-edit', 'post-destroy',
            'product-read', 'product-create', 'product-edit', 'product-destroy',
            'slide-read', 'slide-create', 'slide-edit', 'slide-destroy',
        ];
        foreach ($abilities as $ability) {
            Bouncer::ability(['name' => $ability])->save();
        }
        Bouncer::allow('admin')->to($abilities);
    }
}
