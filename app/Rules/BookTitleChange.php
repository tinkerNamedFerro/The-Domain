<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class BookTitleChange implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $id = 0;
    public function __construct($id)
    {
        $this->id = $id;
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
        //Checks if title is the same or if it exists else where
        return (DB::table('books')->where('title', '=', $value)->first()->id == $this->id);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Title needs to be uniquie .';
    }
}
