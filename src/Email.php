<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;
use function filter_var;
use const FILTER_VALIDATE_EMAIL;

final class Email
{
    private function __construct(
        private string $email
    ){}

    public static function create(string $email): self
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf(
                '"%s" is not a valid email',
                $email
            ));
        }

        return new self($email);
    }

    public function asString(): string
    {
        return $this->email;
    }
}
