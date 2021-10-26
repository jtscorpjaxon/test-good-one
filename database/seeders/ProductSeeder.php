<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>'Ko\'ylak',
            'code'=>'0001',
        ]);
        Product::create([
            'name'=>'Shim',
            'code'=>'0002',
        ]);
    }
}
