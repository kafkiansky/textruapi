<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\Model;

final class ResultFor
{
    /**
     * @var string
     */
    private $uid;

    /**
     * @var JsonVisible
     */
    private $jsonvisible;

    public function __construct(string $uid,  JsonVisible $jsonvisible)
    {
        if (null === $uid || $uid === '') {
            throw new \InvalidArgumentException('Uid must not be empty');
        }

        $this->uid = $uid;
        $this->jsonvisible = $jsonvisible;
    }

    /**
     * @return JsonVisible
     */
    public function getJsonvisible(): JsonVisible
    {
        return $this->jsonvisible;
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }
}
