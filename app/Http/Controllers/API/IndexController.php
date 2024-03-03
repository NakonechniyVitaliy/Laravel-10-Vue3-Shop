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
        $selectedFilter = $data['selectedFilter'];
        unset($data['selectedFilter']);

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        if($selectedFilter == 2){
            $products = Product::filter($filter)->orderBy('title')->get();
        } else if ($selectedFilter == 3) {
            $products = Product::filter($filter)->orderByDesc('title')->get();
        } else if ($selectedFilter == 4) {
            $products = Product::filter($filter)->orderBy('price')->get();
        } else if ($selectedFilter == 5) {
            $products = Product::filter($filter)->orderByDesc('price')->get();
        } else if ($selectedFilter == 6) {
            $products = Product::filter($filter)->orderByDesc('created_at')->get();
        } else {
            $products = Product::filter($filter)->get();
        }

        return IndexProductsResource::collection($products);
    }
}
