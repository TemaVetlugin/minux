<?php

namespace App\Http\Controllers\Screenshot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Screenshot\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Screenshot;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(  StoreRequest $request)
    {
        $data=$request->validated();
        $data['main_image'] = Storage::disk('public')->put('/screenshots', $data['main_image']);
        Screenshot::create($data);
        return response([]);
    }

}
