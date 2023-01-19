<?php

namespace App\Http\Controllers\Client;

use App\Events\FeedbackCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFeedback;
use App\Jobs\SendEmailJob;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('client.feedback');
    }

    public function store(CreateFeedback $request)
    {
        $feedback = Feedback::create([
            'subject' => $request->subject,
            'message' => $request->message,
            'creation_user_id' => Auth::id(),
            'answered' => 0
        ]);

        if ($request->hasFile('attachment')) {
            $feedback->attachment_path = $request->file('attachment')->store('files');
            $feedback->save();
        }

        return redirect()->route('client.feedback.create')->with('success', true);
    }
}
