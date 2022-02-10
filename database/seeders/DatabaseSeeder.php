<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name'     => 'Abdulaha Islam',
            'email'    => 'abdulahaislam210917@gmail.com',
            'password' => bcrypt('01918786189'),
            'usertype' => '2'
        ]);

        User::create([
            'name'     => 'John Doe',
            'email'    => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '1'
        ]);
    }
}
