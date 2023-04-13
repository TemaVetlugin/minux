<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Feedback;

class StoreController extends Controller
{
    public function __invoke(  StoreRequest $request)
    {
        $data=$request->validated();
        Feedback::create($data);
        return response([]);
    }

}
