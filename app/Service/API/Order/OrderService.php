<?php


namespace App\Service\API\Order;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderService
{
    public function store($data)
    {
        $order = Order::create([
            'user_id' => $data['user_id'],
            'products' => json_encode($data['products']),
            'total_price' => $data['total_price'],
        ]);
        return $order;
    }
}
