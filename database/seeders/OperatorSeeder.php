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

        $totalOperators = 10; // Numero totale di operatori
        $availableOperatorsCount = (int) ($totalOperators * 0.5); // Almeno il 50% disponibili
        $unavailableOperatorsCount = $totalOperators - $availableOperatorsCount;

        // Crea operatori disponibili
        for ($i = 0; $i < $availableOperatorsCount; $i++) {
            Operator::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'is_available' => true,
            ]);
        }

        // Crea operatori non disponibili
        for ($i = 0; $i < $unavailableOperatorsCount; $i++) {
            Operator::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'is_available' => false,
            ]);
        }

        $this->command->info('OperatorSeeder completato con successo!');
    }
}
