<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Products\IndexProductsResource;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $selectedFilter = $data['selectedFilter'];
        unset($data['selectedFilter']);

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        if($selectedFilter == 2){
            $products = Product::filter($filter)->orderBy('title')->paginate(6);
        } else if ($selectedFilter == 3) {
            $products = Product::filter($filter)->orderByDesc('title')->paginate(6);
        } else if ($selectedFilter == 4) {
            $products = Product::filter($filter)->orderBy('price')->paginate(6);
        } else if ($selectedFilter == 5) {
            $products = Product::filter($filter)->orderByDesc('price')->paginate(6);
        } else if ($selectedFilter == 6) {
            $products = Product::filter($filter)->orderByDesc('created_at')->getpaginate(6);
        } else {
            $products = Product::filter($filter)->paginate(6);
        }

        return IndexProductsResource::collection($products);
    }
}
