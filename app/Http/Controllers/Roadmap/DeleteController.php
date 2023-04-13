<?php

namespace App\Http\Controllers\Roadmap;

use App\Models\Roadmap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke( Roadmap $roadmap)
    {
        $roadmap->delete();
        return response([]);
    }
}
