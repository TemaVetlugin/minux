<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\WorkerResource;
use App\Models\Worker;

class IndexController extends Controller
{
    public function __invoke()
    {
        $workers=Worker::all();
        return WorkerResource::collection($workers);
    }

}
