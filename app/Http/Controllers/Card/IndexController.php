<?php

namespace App\Http\Controllers\Card;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CardResource;
use App\Models\Card;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cards=Card::all();
        return CardResource::collection($cards);
    }

}
