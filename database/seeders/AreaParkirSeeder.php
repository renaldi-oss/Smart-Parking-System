<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaParkir;
class AreaParkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parkingData = [
            ['id' => 1, 'kode' => 'A1', 'status' => true],
            ['id' => 2, 'kode' => 'A2', 'status' => true],
            ['id' => 3, 'kode' => 'A3', 'status' => true],
            ['id' => 4, 'kode' => 'B1', 'status' => true],
            ['id' => 5, 'kode' => 'B2', 'status' => true],
            ['id' => 6, 'kode' => 'B3', 'status' => true]
        ];
        AreaParkir::insert($parkingData);
    }
}
