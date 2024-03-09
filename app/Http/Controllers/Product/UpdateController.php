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

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $tags = [];
        $colors = [];
        $this->service->update($data, $product);

        return view('product.show', compact('product', 'colors', 'tags'));
    }
}
