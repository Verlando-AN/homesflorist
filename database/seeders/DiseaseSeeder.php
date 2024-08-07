<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disease;

class DiseaseSeeder extends Seeder
{
    public function run()
    {
        $diseases = [
            ['code' => 'P01', 'name' => 'Pink eye'],
            ['code' => 'P02', 'name' => 'ORF atau dakangan'],
            ['code' => 'P03', 'name' => 'Mastitis'],
            ['code' => 'P04', 'name' => 'Diare'],
            ['code' => 'P05', 'name' => 'Pneumonia atau Radang Paru-Paru'],
            ['code' => 'P06', 'name' => 'Food Root atau Kuku Busuk'],
            ['code' => 'P07', 'name' => 'Cacingan'],
            ['code' => 'P08', 'name' => 'Scabies'],
        ];

        foreach ($diseases as $disease) {
            disease::create($disease);
        }
    }
}
