<?php

namespace App\Http\Controllers\Algorithm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Algorithm\StoreRequest;
use App\Models\Algorithm;

class UpdateController extends Controller
{
    public function __invoke( StoreRequest $request, Algorithm $algorithm)
    {
        $data=$request->validated();
        $algorithm->update($data);
        return response([]);
    }

}
