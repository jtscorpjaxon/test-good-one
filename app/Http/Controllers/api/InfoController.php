<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\api\ProductRequest;
use App\Http\Resources\api\ProductResource;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\JsonResponse;

class InfoController extends ApiController
{
    public function index(ProductRequest $request): JsonResponse
    {
        $ids = array_column($request->data, 'product_id');
        $products = Product::query()->whereIn('id', $ids)->get()->load('materials')->map(
            function ($product) use ($request) {
                $key = array_search($product->id, array_column($request->data, 'product_id'));
                $product->qty = $request->data[$key]['quantity'];
                return $product;
            }
        );
        $data = [];
        $ware_house=[];
        foreach ($products as $product) {
            if (!empty($ware_house))
                $product->warehouse_remainder=$ware_house;
            $data[] = [
                "product_name" => $product->name,
                "product_qty" => $product->qty,
                "product_materials" => $product->warehouse
            ];

            $ware_house=$product->warehouse_remainder;
        }
        return $this->success($data);
    }
}
