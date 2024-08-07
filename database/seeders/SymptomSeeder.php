<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Symptom;

class SymptomSeeder extends Seeder
{
    public function run()
    {
        $symptoms = [
            ['code' => 'G01', 'name' => 'Mata berair', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G02', 'name' => 'Kemerahan pada bagian putih mata', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G03', 'name' => 'Mata bengkak', 'mb' => 0.8, 'md' => 0.2, 'cf' => 0.16],
            ['code' => 'G04', 'name' => 'Kornea mata tertutup lapisan putih', 'mb' => 1.0, 'md' => 0.2, 'cf' => 0.2],
            ['code' => 'G05', 'name' => 'Keropeng disekitar wajah, kaki, ambing, dan scrotum', 'mb' => 0.4, 'md' => 0.2, 'cf' => 0.8],
            ['code' => 'G06', 'name' => 'Ternak terlihat lesu', 'mb' => 0.8, 'md' => 0.6, 'cf' => 0.48],
            ['code' => 'G07', 'name' => 'Pembengkakan pada mulut', 'mb' => 1.0, 'md' => 0.2, 'cf' => 0.2],
            ['code' => 'G08', 'name' => 'Ambing atau puting terasa panas saat dipegang', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G09', 'name' => 'Nafsu makan berkurang', 'mb' => 0.8, 'md' => 0.6, 'cf' => 0.48],
            ['code' => 'G10', 'name' => 'Pembengkakan pada ambing atau puting', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G11', 'name' => 'Demam', 'mb' => 0.8, 'md' => 0.4, 'cf' => 0.32],
            ['code' => 'G12', 'name' => 'Kemerahan pada ambing', 'mb' => 1.0, 'md' => 0.2, 'cf' => 0.2],
            ['code' => 'G13', 'name' => 'Feses lembek atau cair', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G14', 'name' => 'Adanya lendir atau darah pada feses', 'mb' => 0.8, 'md' => 0.2, 'cf' => 0.16],
            ['code' => 'G15', 'name' => 'Dehidrasi', 'mb' => 0.8, 'md' => 0.6, 'cf' => 0.48],
            ['code' => 'G16', 'name' => 'Sulit bernafas', 'mb' => 1.0, 'md' => 0.2, 'cf' => 0.2],
            ['code' => 'G17', 'name' => 'Batuk berdahak berkepanjangan', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G18', 'name' => 'Keluar cairan atau ingus', 'mb' => 0.8, 'md' => 0.4, 'cf' => 0.16],
            ['code' => 'G19', 'name' => 'Pincang', 'mb' => 1.0, 'md' => 0.6, 'cf' => 0.2],
            ['code' => 'G20', 'name' => 'Kerusakan pada kulit kaki', 'mb' => 1.0, 'md' => 0.2, 'cf' => 0.2],
            ['code' => 'G21', 'name' => 'Kuku bagian atas meradang', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G22', 'name' => 'Teracak berwarna merah', 'mb' => 0.8, 'md' => 0.4, 'cf' => 0.16],
            ['code' => 'G23', 'name' => 'Bengkak disekitar kuku', 'mb' => 0.8, 'md' => 0.4, 'cf' => 0.32],
            ['code' => 'G24', 'name' => 'Kuku bernanah', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G25', 'name' => 'Bulu rontok', 'mb' => 1.0, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G26', 'name' => 'Bulu kusam dan kotor', 'mb' => 0.8, 'md' => 0.4, 'cf' => 0.32],
            ['code' => 'G27', 'name' => 'Gatal bagian tubuh', 'mb' => 0.8, 'md' => 0.6, 'cf' => 0.48],
            ['code' => 'G28', 'name' => 'Keropeng pada kulit', 'mb' => 0.1, 'md' => 0.4, 'cf' => 0.4],
            ['code' => 'G29', 'name' => 'Penebalan pada kulit yang gatal', 'mb' => 1.0, 'md' => 0.2, 'cf' => 0.2],
        ];

        foreach ($symptoms as $symptom) {
            Symptom::create($symptom);
        }
    }
}
