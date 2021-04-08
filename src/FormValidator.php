<?php

declare(strict_types=1);

namespace App;

use DateTimeImmutable;

final class FormValidator
{
    public function validate(
        DateTimeImmutable $start,
        DateTimeImmutable $end,
        int $newId,
        string $description
    ): void {
        $errors = [];
        if ($start > $end) {
            $errors[] = 'End must be after start';
        }

        if ($newId <= 0) {
            $errors[] = 'The new id must be greater than 0';
        }

        if ($description === '') {
            $errors[] = 'Description can not be empty';
        }

        if ($errors !== []) {
            throw FormValidationException::fromValidationErrors($errors);
        }
    }
}
