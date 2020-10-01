<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class AuthorExistsEdit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($last_name, $dob, $id)
    {
        $this->last_name = $last_name;
        $this->dob = $dob;
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
        $it_exits = $author = DB::table('authors')->where('first_name', $value)
            ->where('last_name', $this->last_name)
            ->where('date_of_birth', $this->dob)->exists();
            
        if ($it_exits){
            // Returns false if matching other author record
            $is_same = $author = DB::table('authors')->where('first_name', $value)
                                ->where('last_name', $this->last_name)
                                ->where('date_of_birth', $this->dob)->first()->id == $this->id;
        }else{
            // Return true as it doesn't match anything existing
            $is_same = true;
        }

        return $is_same;   
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
