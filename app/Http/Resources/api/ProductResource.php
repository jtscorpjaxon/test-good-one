<?php

namespace App\Http\Resources\api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
         * @var Product $this
         */
        return [
            "product_name" => $this->name,
            "product_qty" => $this->qty,
            "product_materials" => ProductMaterialResource::collection($this->materials),
        ];
    }
}
