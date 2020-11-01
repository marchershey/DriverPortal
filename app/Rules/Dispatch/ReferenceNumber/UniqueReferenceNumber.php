<?php

namespace App\Rules\Dispatch\ReferenceNumber;

use App\Models\Dispatch;
use Illuminate\Contracts\Validation\Rule;

class UniqueReferenceNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !Dispatch::where(['reference_number' => $value, 'deleted' => 0])->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You already have an existing dispatch with that reference number.';
    }
}
