<?php

namespace App\Http\Controllers;

use App\Events\CreateFeedback;
use App\Http\Requests\CreateFeedbackRequest;
use App\Services\FeedbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * @param  FeedbackService  $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(FeedbackService $service)
    {
        return view('show', ['feedbacks' => $service->show()]);
    }

    /**
     * @param  CreateFeedbackRequest  $request
     * @param  FeedbackService  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFeedbackRequest $request, FeedbackService $service)
    {
        event(new CreateFeedback($service->create(Auth::user(), $request->all())));

        return redirect()->route('show');
    }
}
