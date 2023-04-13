<?php

namespace App\Http\Controllers\Algorithm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Algorithm\StoreRequest;
use App\Http\Resources\Admin\AlgorithmResource;
use App\Models\Algorithm;

class StoreController extends Controller
{
    public function __invoke(  StoreRequest $request)
    {
        $data=$request->validated();
        Algorithm::create($data);
        return response([]);
    }

}
