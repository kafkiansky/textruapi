<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

use Kafkiansky\Textru\Exception\InvalidExceptUrlException;

final class ExceptUrl
{
    /**
     * @var array
     */
    private $value;

    public function __construct(array $urls)
    {
        if (\count($urls) < 1 || !\is_array($urls)) {
            throw new InvalidExceptUrlException('Urls must be array and not empty');
        }

        $this->value = $urls;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return implode(',', $this->value);
    }
}
