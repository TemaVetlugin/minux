<?php

namespace App\Http\Controllers\Algorithm;

use App\Models\Algorithm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke( Algorithm $algorithm)
    {
        $algorithm->delete();
        return response([]);
    }
}
