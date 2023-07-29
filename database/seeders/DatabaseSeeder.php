<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MasterEquipment;
use App\Models\Renter;
use App\Models\RenterEquipment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = 1000;

        MasterEquipment::create([
            'name' => 'Tenda',
            'description' => fake()->sentence(15, true),
        ]);

        MasterEquipment::create([
            'name' => 'Kompor Portable',
            'description' => fake()->sentence(15, true),
        ]);

        MasterEquipment::create([
            'name' => 'Selimut',
            'description' => fake()->sentence(15, true),
        ]);

        MasterEquipment::create([
            'name' => 'Sleeping Bag',
            'description' => fake()->sentence(15, true),
        ]);

        MasterEquipment::create([
            'name' => 'Senter',
            'description' => fake()->sentence(15, true),
        ]);

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

            RenterEquipment::create([
                'renter_id' => $i+1,
                'equipment_id' => 1,
                'qty' => rand(3,25),
                'price' => rand(0,1) ? 75000 : 120000,
            ]);

            RenterEquipment::create([
                'renter_id' => $i+1,
                'equipment_id' => 2,
                'qty' => rand(3,25),
                'price' => rand(0,1) ? 5000 : 7000,
            ]);

            RenterEquipment::create([
                'renter_id' => $i+1,
                'equipment_id' => 3,
                'qty' => rand(3,25),
                'price' => rand(0,1) ? 3500 : 7000,
            ]);

            RenterEquipment::create([
                'renter_id' => $i+1,
                'equipment_id' => 4,
                'qty' => rand(3,25),
                'price' => rand(0,1) ? 10000 : 25000,
            ]);

            RenterEquipment::create([
                'renter_id' => $i+1,
                'equipment_id' => 5,
                'qty' => rand(3,25),
                'price' => rand(0,1) ? 2500 : 6500,
            ]);
        }

        User::create([
            'email' => 'fauzi@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin'
        ]);

    }
}
