<?php

declare(strict_types=1);

namespace Kafkiansky\Textru;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Kafkiansky\Textru\Model\CallbackUrl;
use Kafkiansky\Textru\Model\Copying;
use Kafkiansky\Textru\Model\ExceptDomain;
use Kafkiansky\Textru\Model\ExceptUrl;
use Kafkiansky\Textru\Model\JsonVisible;
use Kafkiansky\Textru\Model\QueuedText;
use Kafkiansky\Textru\Model\ResultFor;
use Kafkiansky\Textru\Model\Visible;
use Kafkiansky\Textru\ReadModel\CheckedResult;
use Kafkiansky\Textru\ReadModel\QueuedTextResponse;
use Kafkiansky\Textru\Model\UserKey;

final class TextruInteractor
{
    private const API_URL = 'http://api.text.ru/';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var UserKey
     */
    private $userKey;

    public function __construct(ClientInterface $client, UserKey $userKey)
    {
        $this->client = $client ?: new Client();
        $this->userKey = $userKey;
    }

    public function sendForVerification(QueuedText $queuedText): QueuedTextResponse
    {
        $content = $this->client->request('POST', self::API_URL . 'post', [
            'form_params' => [
                'text' => $queuedText->getText()->getValue(),
                'userkey' => $this->userKey->getValue(),
                'exceptdomain' => $queuedText->getExceptDomain() instanceof ExceptDomain ? $queuedText->getExceptDomain()->getValue() : '',
                'excepturl' => $queuedText->getExceptUrl() instanceof ExceptUrl ? $queuedText->getExceptUrl()->getValue() : '',
                'visible' => $queuedText->getVisible() instanceof Visible ? $queuedText->getVisible()->getValue() : '',
                'copying' => $queuedText->getCopying() instanceof Copying ? $queuedText->getCopying()->getValue() : '',
                'callback' => $queuedText->getCallbackUrl() instanceof CallbackUrl ? $queuedText->getCallbackUrl()->getValue() : ''
            ]
        ])
            ->getBody()
            ->getContents()
        ;

        $response = json_decode($content, true);

        return new QueuedTextResponse(
            $response['text_uid'] ?? null,
            $response['error_code'] ?? null,
            $response['error_desc'] ?? null
        );
    }

    public function getResultFor(ResultFor $resultFor): CheckedResult
    {
        $response = $this->client->request('POST', self::API_URL . 'post', [
            'form_params' => [
                'uid' => $resultFor->getUid(),
                'userkey' => $this->userKey->getValue(),
                'jsonvisible' => $resultFor->getJsonvisible() instanceof JsonVisible ? $resultFor->getJsonvisible()->getValue() : ''
            ]
        ])
            ->getBody()
            ->getContents()
        ;

        return $this->parseResult($response);
    }

    public function getRemainingChars()
    {
        $response = $this->client->request('POST', self::API_URL . 'account', [
            'form_params' => [
                'method' => 'get_packages_info',
                'userkey' => $this->userKey->getValue()
            ]
        ])
            ->getBody()
            ->getContents()
        ;

        $size = json_decode($response, true);

        return $size['size'];
    }

    /**
     * @param string $response
     *
     * @return CheckedResult
     */
    private function parseResult(string $response): CheckedResult
    {
        $body = json_decode($response, true);

        $textUnique = isset($body['text_unique']) ? $body['text_unique'] : null;
        $resultJson = isset($body['result_json']) ? json_decode($body['result_json'], true) : [];
        $seoCheck = isset($body['seo_check']) ? json_decode($body['seo_check'], true) : [];

        $checkedResult = new CheckedResult();
        $checkedResult->setUnique($textUnique);

        if (\count($resultJson) > 0 && \is_array($resultJson)) {
            $checkedResult
                ->setDateCheck($resultJson['date_check'])
                ->setUrls($resultJson['urls']);
        }

        if (\count($seoCheck) > 0 && is_array($seoCheck)) {
            $checkedResult
                ->setCountCharsWithSpace($seoCheck['count_chars_with_space'])
                ->setCountCharsWithoutSpace($seoCheck['count_chars_without_space'])
                ->setWaterPercent($seoCheck['water_percent'])
                ->setSpamPercent($seoCheck['spam_percent'])
                ->setCountWords($seoCheck['count_words'])
                ->setListKeys($seoCheck['list_keys'])
                ->setListKeysGroup($seoCheck['list_keys_group']);
        }

        return $checkedResult;
    }
}
