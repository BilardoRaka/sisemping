<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Renter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = 10;
        User::factory($user)->create();

        for ($i=0; $i < $user ; $i++) { 
            Renter::create([
                'user_id' => $i+1,
                'city_id' => rand(1,514),
                'name' => fake()->name(),
                'description' => fake()->sentence(25, true),
                'phone' => fake()->e164PhoneNumber(),
                'address' => fake()->address(),
            ]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
