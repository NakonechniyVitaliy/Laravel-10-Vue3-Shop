<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Products\IndexProductsResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $result = [
            'categories' => Category::all(),
            'colors' => Color::all(),
            'tags' => Tag::all(),
            'price' => [
                'min' => Product::min('price'),
                'max' => Product::max('price'),
                ],
            ];

        return response()->json($result);
    }
}
