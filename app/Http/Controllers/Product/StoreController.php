<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagIds = $data['tag_ids'];
        $productImages = $data['products_images'];

        $colorIds = $data['color_ids'];
        unset($data['tag_ids'], $data['color_ids'], $data['products_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($productImages as $productImage){
            $file_path = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create([
                'file_path' => $file_path,
                'product_id' => $product->id
            ]);
        }

        if (isset($tagIds)){
            $product->tags()->attach($tagIds);
        }
        if (isset($tagIds)){
            $product->colors()->attach($colorIds);
        }


        return redirect()->route('product.index');
    }
}
