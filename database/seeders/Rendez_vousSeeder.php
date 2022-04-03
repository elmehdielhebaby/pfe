<?php

namespace Database\Seeders;

use App\Models\Rendez_vous;
use Illuminate\Database\Seeder;

class Rendez_vousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rendez_vous::factory()->count(50)->create();
    }
}
