<?php

namespace App\Http\Controllers\Screenshot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Screenshot\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Screenshot;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke( StoreRequest $request, Screenshot $screenshot)
    {
        $data=$request->validated();
        if(isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('/screenshots', $data['main_image']);}
        $screenshot->update($data);
        return response([]);
    }

}
