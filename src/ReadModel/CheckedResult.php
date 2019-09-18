<?php

declare(strict_types=1);

namespace Kafkiansky\Textru\ReadModel;

final class CheckedResult
{
    /**
     * @var \DateTimeImmutable|null
     */
    private $dateCheck;

    /**
     * @var string|null
     */
    private $unique;

    /**
     * @var array|null
     */
    private $urls;

    /**
     * @var int|null
     */
    private $countCharsWithSpace;

    /**
     * @var int|null
     */
    private $countCharsWithoutSpace;

    /**
     * @var int|null
     */
    private $countWords;

    /**
     * @var int|null
     */
    private $waterPercent;

    /**
     * @var int|null
     */
    private $spamPercent;

    /**
     * @var array|null
     */
    private $listKeys;

    /**
     * @var array|null
     */
    private $listKeysGroup;

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDateCheck(): ?\DateTimeImmutable
    {
        return $this->dateCheck;
    }

    /**
     * @return string|null
     */
    public function getUnique(): ?string
    {
        return $this->unique;
    }

    /**
     * @return array|null
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }

    /**
     * @return int|null
     */
    public function getCountCharsWithSpace(): ?int
    {
        return $this->countCharsWithSpace;
    }

    /**
     * @return int|null
     */
    public function getCountCharsWithoutSpace(): ?int
    {
        return $this->countCharsWithoutSpace;
    }

    /**
     * @return int|null
     */
    public function getCountWords(): ?int
    {
        return $this->countWords;
    }

    /**
     * @return int|null
     */
    public function getWaterPercent(): ?int
    {
        return $this->waterPercent;
    }

    /**
     * @return int|null
     */
    public function getSpamPercent(): ?int
    {
        return $this->spamPercent;
    }

    /**
     * @return array|null
     */
    public function getListKeys(): ?array
    {
        return $this->listKeys;
    }

    /**
     * @return array|null
     */
    public function getListKeysGroup(): ?array
    {
        return $this->listKeysGroup;
    }

    /**
     * @param string|null $dateCheck
     *
     * @return CheckedResult
     */
    public function setDateCheck(?string $dateCheck): CheckedResult
    {
        $this->dateCheck = \DateTimeImmutable::createFromFormat('d.m.Y H:i:s', $dateCheck);

        return $this;
    }

    /**
     * @param string|null $unique
     *
     * @return CheckedResult
     */
    public function setUnique(?string $unique): CheckedResult
    {
        $this->unique = $unique;

        return $this;
    }

    /**
     * @param array|null $urls
     *
     * @return CheckedResult
     */
    public function setUrls(?array $urls): CheckedResult
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * @param int|null $countCharsWithSpace
     *
     * @return CheckedResult
     */
    public function setCountCharsWithSpace(?int $countCharsWithSpace): CheckedResult
    {
        $this->countCharsWithSpace = $countCharsWithSpace;

        return $this;
    }

    /**
     * @param int|null $countCharsWithoutSpace
     *
     * @return CheckedResult
     */
    public function setCountCharsWithoutSpace(?int $countCharsWithoutSpace): CheckedResult
    {
        $this->countCharsWithoutSpace = $countCharsWithoutSpace;

        return $this;
    }

    /**
     * @param int|null $countWords
     *
     * @return CheckedResult
     */
    public function setCountWords(?int $countWords): CheckedResult
    {
        $this->countWords = $countWords;

        return $this;
    }

    /**
     * @param int|null $waterPercent
     *
     * @return CheckedResult
     */
    public function setWaterPercent(?int $waterPercent): CheckedResult
    {
        $this->waterPercent = $waterPercent;

        return $this;
    }

    /**
     * @param int|null $spamPercent
     *
     * @return CheckedResult
     */
    public function setSpamPercent(?int $spamPercent): CheckedResult
    {
        $this->spamPercent = $spamPercent;

        return $this;
    }

    /**
     * @param array|null $listKeys
     *
     * @return CheckedResult
     */
    public function setListKeys(?array $listKeys): CheckedResult
    {
        $this->listKeys = $listKeys;

        return $this;
    }

    /**
     * @param array|null $listKeysGroup
     *
     * @return CheckedResult
     */
    public function setListKeysGroup(?array $listKeysGroup): CheckedResult
    {
        $this->listKeysGroup = $listKeysGroup;

        return $this;
    }

    public function isChecked()
    {
        return $this->dateCheck instanceof \DateTimeImmutable;
    }

    public function __construct()
    {
    }
}
