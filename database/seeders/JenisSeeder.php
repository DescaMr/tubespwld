<?php

namespace Database\Seeders;

use App\Models\JenisBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisBarang::insert([
            [
                'id' => '1',
                'nama' => 'Aksesoris',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'nama' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'nama' => 'Fashion',
                'created_at' => now(),
                'updated_at' => now()
            ],
          
            
        ]);
    }
}