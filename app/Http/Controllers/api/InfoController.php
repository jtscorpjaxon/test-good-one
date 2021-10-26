<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\api\ProductRequest;
use App\Http\Resources\api\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class InfoController extends ApiController
{
    public function index(ProductRequest $request): JsonResponse
    {
        $ids = array_column($request->data,'product_id');
        $products = Product::query()->whereIn('id',$ids)->get()->load('materials')->map(
            function ($product) use($request) {
                $key=array_search($product->id, array_column($request->data, 'product_id'));
                $product->qty=$request->data[$key]['quantity'];
                return $product;
            }
        );

        return $this->success(ProductResource::collection($products));
    }
}
