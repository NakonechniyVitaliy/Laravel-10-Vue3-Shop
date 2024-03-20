<?php

namespace App\Http\Controllers\API\Product;



use App\Http\Requests\API\Product\StoreRequest;
use App\Models\Comment;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
        return 'True';

    }
}
