<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Elenco delle categorie
        $categories = [
            ['name' => 'Bug'],
            ['name' => 'Feature'],
            // ['name' => 'General'],
            ['name' => 'Support'],
        ];

        // Frequenza con cui le categorie devono apparire
        $categoryFrequencies = [
            'Bug' => 25,
            'Feature' => 25,
            'Support' => 25,
        ];

        // Creazione delle categorie
        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('CategorySeeder completato con successo!');
    }
}
