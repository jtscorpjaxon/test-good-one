<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'name'=>'Mato'
        ]);
         Material::create([
            'name'=>'Ip'
        ]);
         Material::create([
            'name'=>'Tugma'
        ]);
         Material::create([
            'name'=>'Zamok'
        ]);

    }
}
