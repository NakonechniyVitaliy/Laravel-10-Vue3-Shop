<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Mail\Order\ListMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $order = $this->service->store($data);

//        foreach ($order as $order_element) {
//            $decodedProducts = json_decode($order_element->products);
//            $order_element->products = $decodedProducts;
//        }

        $user_name = auth()->user()->name;
        Mail::to(auth()->user()->email)->send(new ListMail($order, $user_name));

        return new OrderResource($order);
    }
}
