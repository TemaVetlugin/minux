<?php

namespace App\Http\Controllers\Roadmap;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RoadmapResource;
use App\Models\Roadmap;

class IndexController extends Controller
{
    public function __invoke()
    {
        $roadmaps=Roadmap::all();
        return RoadmapResource::collection($roadmaps);
    }

}
