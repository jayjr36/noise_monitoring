<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NoiseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sensors = ['sensor1', 'sensor2'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('noise_data')->insert([
                'sensor_id' => $sensors[array_rand($sensors)],
                'noise_level' => mt_rand(50, 100) / 10,  // random noise level between 5.0 and 10.0
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
