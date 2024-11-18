<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operator;
use Faker\Factory as Faker;

class OperatorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Operator::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
            ]);
        }
    }
}

