<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $tagIds = $data['tag_ids'];
        $colorIds = $data['color_ids'];
        unset($data['tag_ids'], $data['color_ids']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        if (isset($tagIds)){
            $product->tags()->attach($tagIds);
        }
        if (isset($tagIds)){
            $product->colors()->attach($colorIds);
        }


        return redirect()->route('product.index');
    }
}
