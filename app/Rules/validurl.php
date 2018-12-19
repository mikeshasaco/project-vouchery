<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validurl implements Rule
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
        function remove_http($value) {
       $disallowed = array('http://', 'https://');
       foreach($disallowed as $d) {
          if(strpos($value, $d) === 0) {
             return str_replace($d, '', $value);
          }
       }
     }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Validate the http: and https:';
    }
}
