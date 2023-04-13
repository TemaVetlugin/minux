<?php

namespace App\Http\Controllers\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Card\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Card;

class UpdateController extends Controller
{
    public function __invoke( StoreRequest $request, Card $card)
    {
        $data=$request->validated();
        $card->update($data);
        return response([]);
    }

}
