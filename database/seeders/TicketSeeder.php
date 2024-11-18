<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Operator;
use App\Models\Category;
use Faker\Factory as Faker;

class TicketSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $operators = Operator::all();
        $categories = Category::all();

        for ($i = 0; $i < 50; $i++) {
            Ticket::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'status' => $faker->randomElement(['ASSIGNED', 'IN_PROGRESS', 'CLOSED']),
                'operator_id' => $operators->random()->id,
                'category_id' => $categories->random()->id,
            ]);
        }
    }
}

