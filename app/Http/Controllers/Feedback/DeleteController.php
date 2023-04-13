<?php

namespace App\Http\Controllers\Feedback;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke( Feedback $feedback)
    {
        $feedback->delete();
        return response([]);
    }
}
