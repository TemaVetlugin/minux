<?php

namespace App\Http\Controllers\Roadmap;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roadmap\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Roadmap;

class StoreController extends Controller
{
    public function __invoke(  StoreRequest $request)
    {
        $data=$request->validated();
        Roadmap::create($data);
        return response([]);
    }

}
