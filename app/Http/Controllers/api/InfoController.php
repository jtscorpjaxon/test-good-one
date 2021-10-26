<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\api\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class InfoController extends ApiController
{
    public function index(): JsonResponse
    {
        //dd(Product::first()->load('materials')->materials);
        return $this->success(ProductResource::collection(Product::all()));
    }
}
