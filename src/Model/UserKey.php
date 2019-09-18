<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

use Kafkiansky\Textru\Exception\InvalidUserKeyException;

final class UserKey
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if (null === $value || $value === '') {
            throw new InvalidUserKeyException('User key is required');
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
