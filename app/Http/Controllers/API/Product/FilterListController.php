<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class FilterListController extends BaseController
{
    public function __invoke()
    {
        $result = $this->service->filter();
        return response()->json($result);
    }
}
