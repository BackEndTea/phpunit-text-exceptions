<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;
use function str_ends_with;

final class EmailValidator
{
    public function validateCompanyEmail(Email $email): void
    {
        if (! str_ends_with($email->asString(), '@company.com')) {
            throw new InvalidArgumentException(
                'Only "@company.com" emails are allowed'
            );
        }

        if ($email->asString() === 'bob@company.com') {
            throw new InvalidArgumentException(
                'bob is no longer allowed to log in'
            );
        }
    }
}
