<?php


namespace App\Service\API\Product;

use App\Http\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductService
{
    public function filter()
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
        return $result;
    }

    public function index($data)
    {
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
        return $products;
    }
}
