<?php

namespace App\Http\Controllers\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Card\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Card;

class StoreController extends Controller
{
    public function __invoke(  StoreRequest $request)
    {
        $data=$request->validated();
        Card::create($data);
        return response([]);
    }

}
