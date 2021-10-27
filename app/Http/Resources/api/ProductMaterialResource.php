<?php

namespace App\Http\Resources\api;

use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductMaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var Material $this
         */
        $result=[];
        dd($this);
foreach ($this->warehouses as $warehouse)
        $result[]= [
            "warehouse_id" => $warehouse->id,
            "material_name" => $this->name,
            "qty" => $warehouse->remainder,
            "price" => $warehouse->price,
        ];
return $result;
    }
}
