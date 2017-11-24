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
        // $filePath = storage_path('app/test.json');
        // $string = file_get_contents($filePath);
        // $json = json_decode($string, true);
        // $data = [];
        // foreach ($json['objects']['vnm']['geometries'] as $item) {
        //     \Log::info('\'' . $item['id'] . '\' => \'' . $item['properties']['name'] . '\'');
        // }

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
