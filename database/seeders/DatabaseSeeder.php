<?php

namespace Database\Seeders;

use App\Models\Machine;
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

        $password = bcrypt('admin123');
        User::create([
            "name" => "admin2",
            "email" => "admin123@gmail.com",
            "password" => $password
        ]);

        Machine::create([
            "user_id" => 1,
            "lat" => "-8.4054387",
            "lng" => "115.7014921",
            "temp" => 0,
            "humid" => 0,
            "light" => 0,
            "weight" => 0,
        ]);

        Machine::create([
            "user_id" => 1,
            "lat" => "-8.4054388",
            "lng" => "115.7014921",
            "temp" => 0,
            "humid" => 0,
            "light" => 0,
            "weight" => 0,
        ]);

        Machine::create([
            "user_id" => 1,
            "lat" => "-8.4054386",
            "lng" => "115.7014922",
            "temp" => 0,
            "humid" => 0,
            "light" => 0,
            "weight" => 0,
        ]);
    }
}
