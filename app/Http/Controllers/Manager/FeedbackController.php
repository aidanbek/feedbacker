<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('creationUser')
            ->orderByDesc('created_at')
            ->paginate();

        return view('manager.feedbacks', compact('feedbacks'));
    }

    public function markAsAnswered(string $id)
    {
        Feedback::findOrFail($id)->update(['answered' => 1]);

        return redirect()->route('manager.feedbacks.index')->with('success', 'Заявка отмечена');
    }

    public function downloadAttachment(string $id)
    {
        $path = Feedback::findOrFail($id)->attachment_path;

        return response()->download(storage_path('app/'. $path));
    }
}
