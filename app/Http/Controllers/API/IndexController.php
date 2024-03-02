<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Products\IndexProductsResource;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->get();
        return IndexProductsResource::collection($products);
    }
}
