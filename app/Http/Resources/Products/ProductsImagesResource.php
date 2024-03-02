<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'url' => $this->getProductImagesUrlAttribute(),
        ];
    }
}
