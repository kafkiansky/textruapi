<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Tests\Unit\Model;

use Kafkiansky\Textru\Exception\InvalidUserKeyException;
use Kafkiansky\Textru\Model\UserKey;
use PHPUnit\Framework\TestCase;

class UserKeyTest extends TestCase
{
    public function testUserKeyGotSuccess()
    {
        $userKey = new UserKey('432234235235235');
        $this->assertNotEmpty($userKey->getValue());
    }

    public function testUserKeyGotFailed()
    {
        $this->expectException(InvalidUserKeyException::class);
        $this->expectExceptionMessage('User key is required');
        $userKey = new UserKey('');
    }
}
