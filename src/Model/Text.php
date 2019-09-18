<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

use Kafkiansky\Textru\Exception\InvalidQueuedTextException;

final class Text
{
    /**
     * @var string
     */
    private $value;

    public function __construct(string $value)
    {
        if (\strlen($value) < 100) {
            throw new InvalidQueuedTextException('Text is too short, minimum value is 100 chars');
        }

        if (\strlen($value) > 150000) {
            throw new InvalidQueuedTextException('Text is too long, maximum value is 150000 chars');
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
