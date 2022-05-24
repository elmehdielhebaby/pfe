<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([EtablissementSeeder::class]);
        $this->call([ClientSeeder::class]);
        $this->call([Rendez_vousSeeder::class]);
        $this->call([AdminsTableSeeder::class]);
    }
}
