<?php

use Illuminate\Database\Seeder;
use App\Eloquent\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();
        $user = app(User::class)->create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@toanthang.com',
            'password' => 'secret',
        ]);
        $user->assign('admin');
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'dev') {
            factory(User::class, 50)->create();
        }
    }
}
