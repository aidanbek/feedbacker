<?php

namespace App\Http\Requests;

use App\Rules\FeedbackLimit;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @property string $subject
 * @property string $message
 */
class CreateFeedback extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:255', new FeedbackLimit()],
            'message' => ['required', 'string'],
            'attachment' => ['nullable', 'file', 'max:2048']
        ];
    }
}
