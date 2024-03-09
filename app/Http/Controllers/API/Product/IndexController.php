<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Products\IndexProductsResource;
use App\Models\Product;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $products = $this->service->index($data);
        return IndexProductsResource::collection($products);
    }
}
