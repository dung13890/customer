<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(Config::class)->create([
            'key' => 'name',
            'value' => 'Toàn Thắng',
        ]);
        app(Config::class)->create([
            'key' => 'keywords',
            'value' => 'Toàn thắng, Công ty cổ phần Toàn',
        ]);
        app(Config::class)->create([
            'key' => 'description',
            'value' => 'Công ty cổ phần Toàn Thắng',
        ]);
        app(Config::class)->create([
            'key' => 'facebook',
            'value' => 'https://facebook.com',
        ]);
        app(Config::class)->create([
            'key' => 'youtube',
            'value' => 'https://youtube.com',
        ]);
        app(Config::class)->create([
            'key' => 'twitter',
            'value' => 'https://twitter.com',
        ]);
        app(Config::class)->create([
            'key' => 'whatsapp',
            'value' => 'https://whatsapp.com',
        ]);
        app(Config::class)->create([
            'key' => 'instagram',
            'value' => 'https://instagram.com',
        ]);
        app(Config::class)->create([
            'key' => 'email',
            'value' => 'info@toanthang.com.vn',
        ]);
        app(Config::class)->create([
            'key' => 'phone',
            'value' => '0466530666',
        ]);
        app(Config::class)->create([
            'key' => 'fax',
            'value' => '0466530999',
        ]);
        app(Config::class)->create([
            'key' => 'factory',
            'value' => 'Km3, quốc lộ 2, phường Phúc Thắng, thị xã Phúc Yên, tỉnh Vĩnh Phúc',
        ]);
        app(Config::class)->create([
            'key' => 'copyright',
            'value' => '© 2007 - 2017 TOANTHANG - ALL RIGHTS RESERVED.',
        ]);
        app(Config::class)->create([
            'key' => 'address',
            'value' => 'Tầng 7, Tòa nhà số 8 Quang Trung, Quận Hà Đông, Hà Nội',
        ]);
        app(Config::class)->create([
            'key' => 'map',
            'value' => '',
        ]);
        app(Config::class)->create([
            'key' => 'popup',
            'value' => '',
        ]);
        app(Config::class)->create([
            'key' => 'popup_disp_flg',
            'value' => true,
        ]);
        app(Config::class)->create([
            'key' => 'popup_img_flg',
            'value' => true,
        ]);
        app(Config::class)->create([
            'key' => 'popup_img',
            'value' => '',
        ]);
        app(Config::class)->create([
            'key' => 'introduce',
            'value' => 'introduce',
        ]);
        app(Config::class)->create([
            'key' => 'logo',
            'value' => '',
        ]);
    }
}
