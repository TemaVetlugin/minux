<?php

namespace App\Http\Controllers\Worker;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke( Worker $worker)
    {
        $worker->delete();
        return response([]);
    }
}
