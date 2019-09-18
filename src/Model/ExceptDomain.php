<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

use Kafkiansky\Textru\Exception\InvalidExceptDomainException;

final class ExceptDomain
{
    /**
     * @var array
     */
    private $value;

    public function __construct(array $domains)
    {
        if (\count($domains) < 1 || !\is_array($domains)) {
            throw new InvalidExceptDomainException('Domains must be array and not empty');
        }

        $this->value = $domains;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return implode(',', $this->value);
    }
}
