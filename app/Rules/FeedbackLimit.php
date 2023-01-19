<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FeedbackLimit implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Превышен лимит отправки сообщений обратной связи!';
    }
}
