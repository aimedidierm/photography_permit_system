<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateIssueBeforeExpiry implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dateIssue = \Carbon\Carbon::parse(request()->input('dateIssue'));
        $dateExpiry = \Carbon\Carbon::parse(request()->input('dateExpiry'));

        if (!$dateIssue->lessThan($dateExpiry)) {
            $fail('The date issued must be before the date Expired.');
        }
    }
}
