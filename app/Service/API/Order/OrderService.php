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
        $password = Hash::make(Str::random(15));

        $user = User::firstOrCreate([
            'email' => $data['email']
        ], [
            'name' => $data['name'],
            'address' => $data['address'],
            'password' => $password
        ]);

        $order = Order::create([
            'user_id' => $user->id,
            'products' => json_encode($data['products']),
            'total_price' => $data['total_price'],
        ]);
        return $order;
    }
}
