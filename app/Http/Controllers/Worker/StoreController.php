<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Resources\Admin\CardResource;
use App\Models\Worker;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(  StoreRequest $request)
    {
        $data=$request->validated();
        $data['main_image'] = Storage::disk('public')->put('/workers', $data['main_image']);
        Worker::create($data);
        return response([]);
    }

}
