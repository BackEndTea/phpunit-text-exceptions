<?php

declare(strict_types=1);

namespace App\Test;

use App\FormValidationException;
use App\FormValidator;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class FormValidatorTest extends TestCase
{
    public function testValidatesMultipleErrors(): void
    {
        $validator = new FormValidator();

        try {
            $validator->validate(
                new DateTimeImmutable('2020-01-01'),
                new DateTimeImmutable('1999-01-01'),
                -3,
                ''
            );
            $this->fail('FormValidationException was not thrown');
        } catch (FormValidationException $e) {
            $this->assertSame(
                [
                    'End must be after start',
                    'The new id must be greater than 0',
                    'Description can not be empty',
                ],
                $e->getErrors()
            );
        }
    }
}
