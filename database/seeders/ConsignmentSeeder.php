<?php

namespace Database\Seeders;

use App\Models\Consignment;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Consignment::create([
                'product_id' => fake()->numberBetween(1, 10),
                'store_id' => fake()->numberBetween(1, 10),
                'entry_date' => fake()->date(),
                'exit_date' => fake()->date(),
                'quantity' => fake()->numberBetween(30, 100),
                'sold' => fake()->numberBetween(10, 30),
                'income' => fake()->numberBetween(100000, 200000),
            ]);

        }
    }
}
