<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

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
