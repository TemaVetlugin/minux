<?php

namespace App\Http\Controllers\Card;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke( Card $card)
    {
        $card->delete();
        return response([]);
    }
}
