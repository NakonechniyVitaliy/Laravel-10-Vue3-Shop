<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Service\API\Product\ProductService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
}
