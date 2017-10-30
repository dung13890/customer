<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment('local')) {
            factory(Contact::class, 50)->create();
        }
    }
}
