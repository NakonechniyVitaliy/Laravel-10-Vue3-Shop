<?php


namespace App\Service\Product;


use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function store($data)
    {
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
    }

    public function update($data, $product)
    {
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

        return [
            'product' => $product,
            'colors' => $colors,
            'tags' => $tags
        ];
    }
}
