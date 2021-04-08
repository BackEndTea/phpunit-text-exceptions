<?php

declare(strict_types=1);

namespace App\Test;

use App\Email;
use App\EmailValidator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class EmailValidatorTest extends TestCase
{
    public function testItValidatesEmail(): void
    {
        $email = Email::create('foo@bar.com');

        $validator = new EmailValidator();

        $this->expectException(InvalidArgumentException::class);
        $validator->validateCompanyEmail($email);
    }

    public function testBobCantLogIn(): void
    {
        $email = Email::create('bob@company.com');

        $validator = new EmailValidator();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('bob is no longer allowed to log in');
        $validator->validateCompanyEmail($email);
    }
}
