<?php

namespace Database\Seeders;

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
        $this->call(MaterialSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductMaterialSeeder::class);
        $this->call(WarehouseSeeder::class);
    }
}
