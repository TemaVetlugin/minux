<?php

namespace App\Http\Controllers\Screenshot;

use App\Models\Screenshot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke( Screenshot $screenshot)
    {
        $screenshot->delete();
        return response([]);
    }
}
