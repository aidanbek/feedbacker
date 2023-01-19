<?php

namespace App\Rules;

use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class FeedbackLimit implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return User::where('id', Auth::id())
            ->whereDoesntHave('feedbacks', function ($q) {
                $start = Carbon::now()->copy()->startOf('day');
                $end = Carbon::now()->copy()->endOf('day');

                $q->whereBetween('created_at', [$start, $end]);
            })
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Не более 1 заявки в сутки';
    }
}
