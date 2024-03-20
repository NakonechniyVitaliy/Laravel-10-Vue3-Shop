<?php

namespace App\Http\Controllers\API\Personal;

use App\Http\Controllers\API\Product\BaseController;
use App\Http\Resources\Personal\PersonalResource;
use App\Models\Order;
use App\Models\User;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $user = User::find(auth()->user()->id);
        $orders = $user->orders;

        foreach ($orders as $order) {
            $decodedProducts = json_decode($order->products);
            $order->products = $decodedProducts;
        }


        return PersonalResource::collection($orders);
    }
}
