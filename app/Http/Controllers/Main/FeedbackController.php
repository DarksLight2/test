<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function index ()
    {
        return view('main.feedback');
    }

    public function send (FeedbackRequest $request): \Illuminate\Http\RedirectResponse
    {
        \App\Models\Feedback::factory()->create($request->validated());

        Mail::to('maksym.kovalets@gmail.com')->send(new Feedback($request->validated()));

        return redirect()->route('feedback.index');
    }
}
