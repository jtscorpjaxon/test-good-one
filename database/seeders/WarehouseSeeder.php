<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $material;

    public function __construct()
    {
        $this->material = collect(Material::all()->toArray());
    }
    public function getID($name)
    {

        return $this->material->where('name', $name)->first()['id'];
    }

    public function run()
    {


        Warehouse::create([
            'material_id' => $this->getID('Mato'),
            'remainder' => 12,
            'price' => 1500,
        ]);
        Warehouse::create([
            'material_id' => $this->getID('Mato'),
            'remainder' => 12,
            'price' => 1500,
        ]);

        Warehouse::create([
            'material_id' => $this->getID('Ip'),
            'remainder' => 40,
            'price' => 50,
        ]);
        Warehouse::create([
            'material_id' => $this->getID('Ip'),
            'remainder' => 300,
            'price' => 550,
        ]);

        Warehouse::create([
            'material_id' => $this->getID('Tugma'),
            'remainder' => 500,
            'price' => 500,
        ]);
        Warehouse::create([
            'material_id' => $this->getID('Zamok'),
            'remainder' => 1000,
            'price' => 2000,
        ]);
    }
}
