<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\api\ProductRequest;

use App\Models\Product;
use App\Models\Warehouse;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

class InfoController extends ApiController
{
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(ProductRequest $request): JsonResponse
    {
        $result = $this->service->calculator();
        return $this->success($result);
    }
}
