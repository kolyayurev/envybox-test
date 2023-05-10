<?php

namespace App\Http\Controllers\Api;

use App\Helpers\StaticFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(FeedbackRequest $request)
    {
        StaticFactory::make('email',$request->validated())->save();

        return response()->json(['status' => true]);
    }
}
