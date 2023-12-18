<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShootingDateStartBeforeEnd implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $shootingDateStart = \Carbon\Carbon::parse(request()->input('shootingDateStart'));
        $shootingDateEnd = \Carbon\Carbon::parse(request()->input('shootingDateEnd'));

        if (!$shootingDateStart->lessThan($shootingDateEnd)) {
            $fail('The shooting date start must be before the shooting date end.');
        }
    }
}
