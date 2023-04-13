<?php

namespace App\Http\Controllers\Screenshot;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ScreenshotResource;
use App\Models\Screenshot;

class IndexController extends Controller
{
    public function __invoke()
    {
        $screenshots=Screenshot::all();
        return ScreenshotResource::collection($screenshots);
    }

}
