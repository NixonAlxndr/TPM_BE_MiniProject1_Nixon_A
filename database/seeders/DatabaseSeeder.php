<?php

namespace Database\Seeders;

use App\Models\Culture;
use App\Models\Mythtale;
use Database\Factories\MythtaleFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Culture::factory(20)->create();
        Mythtale::factory(20)->create();
    }
}
