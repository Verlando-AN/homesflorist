<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
    public function run()
    {
        $rules = [
            ['code' => 'R01', 'rule' => 'G01,G02,G03,G04', 'disease_id' => 1],
            ['code' => 'R02', 'rule' => 'G05,G06,G07,G08,G09', 'disease_id' => 2],
            ['code' => 'R03', 'rule' => 'G08,G09,G10,G11,G12', 'disease_id' => 3],
            ['code' => 'R04', 'rule' => 'G06,G09,G13,G14,G15', 'disease_id' => 4],
            ['code' => 'R05', 'rule' => 'G06,G09,G11,G16,G17,G18', 'disease_id' => 5],
            ['code' => 'R06', 'rule' => 'G09,G19,G20,G21,G22,G23,G24', 'disease_id' => 6],
            ['code' => 'R07', 'rule' => 'G06,G09,G15,G25,G26', 'disease_id' => 7],
            ['code' => 'R08', 'rule' => 'G09,G25,G26,G27,G28,G29', 'disease_id' => 8],
        ];

        foreach ($rules as $rule) {
            Rule::create($rule);
        }
    }
}
