<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if (isset($data['preview_image'])) {
            Storage::disk('public')->delete($product->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        if (isset($data['tag_ids'])) {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        } else {
            $tagIds = [];
        }

        if (isset($data['color_ids'])){
            $colorIds = $data['color_ids'];
            unset($data['color_ids']);
        } else {
            $colorIds = [];
        }


        if (isset($tagIds)){
            $product->tags()->sync($tagIds);
        }
        if (isset($colorIds)){
            $product->colors()->sync($colorIds);
        }
        $product->update($data);

        $tags = $product->tags()->get();
        $colors= $product->colors()->get();
        return view('product.show', compact('product', 'colors', 'tags'));
    }
}
