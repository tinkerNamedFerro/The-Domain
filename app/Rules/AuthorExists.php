<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AuthorExists implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($last_name, $dob)
    {
        $this->last_name = $last_name;
        $this->dob = $dob;
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
        return !$author = DB::table('authors')->where('first_name', $value)
                    ->where('last_name', $this->last_name)
                    ->where('date_of_birth', $this->dob)->exists();   
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Author already exists with these details';
    }
}
