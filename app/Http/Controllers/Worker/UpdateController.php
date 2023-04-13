<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Worker;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke( StoreRequest $request, Worker $worker)
    {
        $data=$request->validated();
        if(isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('/workers', $data['main_image']);}
        $worker->update($data);
        return response([]);
    }

}
