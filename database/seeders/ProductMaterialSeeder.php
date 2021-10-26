<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use Illuminate\Database\Seeder;

class ProductMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $material;
    private $product;

    public function __construct()
    {
        $this->material = collect(Material::all()->toArray());
        $this->product=collect(Product::all()->toArray());
    }
    public function getID($name)
    {

        return $this->material->where('name', $name)->first()['id'] ?? $this->product->where('name',$name)->first()['id'];
    }


    public function run()
    {


        //Ko'ylak
        ProductMaterial::create([
            'product_id'=>$this->getID('Ko\'ylak'),
            'material_id'=>$this->getID('Mato'),
            'quantity'=>0.8,
        ]);
        ProductMaterial::create([
            'product_id'=>$this->getID('Ko\'ylak'),
            'material_id'=>$this->getID('Tugma'),
            'quantity'=>5,
        ]);
        ProductMaterial::create([
            'product_id'=>$this->getID('Ko\'ylak'),
            'material_id'=>$this->getID('Ip'),
            'quantity'=>10,
        ]);
        //Shim
        ProductMaterial::create([
            'product_id'=>$this->getID('Shim'),
            'material_id'=>$this->getID('Mato'),
            'quantity'=>1.4,
        ]);
        ProductMaterial::create([
            'product_id'=>$this->getID('Shim'),
            'material_id'=>$this->getID('Ip'),
            'quantity'=>15,
        ]);
        ProductMaterial::create([
            'product_id'=>$this->getID('Shim'),
            'material_id'=>$this->getID('Zamok'),
            'quantity'=>1,
        ]);
    }
}
