<?php

declare(strict_types=1);

namespace App;

use RuntimeException;

final class FormValidationException extends RuntimeException
{
    /**
     * @param array<string> $errors
     */
    private function __construct(private array $errors)
    {
        parent::__construct();
    }

    /**
     * @param array<string> $errors
     */
    public static function fromValidationErrors(array $errors): self
    {
        return new self($errors);
    }

    /**
     * @return array<string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
