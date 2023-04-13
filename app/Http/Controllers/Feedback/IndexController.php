<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\FeedbackResource;
use App\Models\Feedback;

class IndexController extends Controller
{
    public function __invoke()
    {
        $feedbacks=Feedback::all();
        return FeedbackResource::collection($feedbacks);
    }

}
