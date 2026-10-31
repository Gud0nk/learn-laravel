<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test7;

class Test6Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test7::factory()->count(100)->create();
    }
}
