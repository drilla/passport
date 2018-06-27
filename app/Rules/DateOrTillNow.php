<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class DateOrTillNow implements Rule
{
    private $_valid_text;
    private $_format;

    public function __construct(string $format, string $validText) {
        $this->_valid_text = $validText;
        $this->_format     = $format;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        if ($value === $this->_valid_text) {
            return true;
        } else if (Carbon::createFromFormat($this->_format, $value) !== false) {
            return true;
        }

        return false;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'Значение должно быть датой или текстом ":valid_text"';
    }
}
