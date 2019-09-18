<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

final class CallbackUrl
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException('Got invalid url');
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
