<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            "name" => "Oleg",
            "username" => "Oleg",
            "email" => "7den.r7@gmail.com",
            "password" => Hash::make("qweqwe"),
            "role" => "admin"
        ]);

        User::factory(2)->create();
    }
}
