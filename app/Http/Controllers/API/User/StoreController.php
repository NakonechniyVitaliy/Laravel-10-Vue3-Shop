<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\StoreRequest;
use App\Models\User;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        $token = auth()->tokenById($user->id);
        return response(['access_token' => $token]);
    }
}
