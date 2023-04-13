<?php

namespace App\Http\Controllers\Roadmap;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roadmap\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Roadmap;

class UpdateController extends Controller
{
    public function __invoke( StoreRequest $request, Roadmap $roadmap)
    {
        $data=$request->validated();
        $roadmap->update($data);
        return response([]);
    }

}
