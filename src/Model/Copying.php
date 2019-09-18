<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

final class Copying
{
    private const NOADD = 'noadd';

    /**
     * @var string
     */
    private $value;

    /**
     * @return Copying
     */
    public static function noAdd(): Copying
    {
        return new self(self::NOADD);
    }

    private function __construct(string $value)
    {
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
