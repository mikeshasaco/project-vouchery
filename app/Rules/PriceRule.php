<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
     protected $currentprice;
    public function __construct($currentprice)
    {
        $this->currentprice = $currentprice;
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
        return $value <= $this->currentprice;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  "Original price must be higher than discounted price";
    }
}
