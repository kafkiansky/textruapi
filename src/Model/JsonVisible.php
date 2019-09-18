<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

final class JsonVisible
{
    private const DETAIL = 'detail';

    /**
     * @var string
     */
    private $value;

    /**
     * @return JsonVisible
     */
    public static function detail(): JsonVisible
    {
        return new self(self::DETAIL);
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
