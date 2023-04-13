<?php

namespace App\Http\Controllers\Algorithm;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AlgorithmResource;
use App\Models\Algorithm;

class IndexController extends Controller
{
    public function __invoke()
    {
        $algorithms=Algorithm::all();
        return AlgorithmResource::collection($algorithms);
    }

}
