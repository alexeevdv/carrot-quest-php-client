<?php

namespace alexeevdv\CarrotQuest;

use GuzzleHttp\ClientInterface as GuzzleClient;
use GuzzleHttp\RequestOptions;

/**
 * Class Client
 * @package alexeevdv\CarrotQuest
 */
class Client implements ClientInterface
{
    /**
     * @var string
     */
    private $authToken;

    /**
     * @var GuzzleClient
     */
    private $guzzle;

    public function __construct(string $authToken, GuzzleClient $guzzle)
    {
        $this->authToken = $authToken;
        $this->guzzle = $guzzle;
    }

    /**
     * @inheritDoc
     */
    public function userSetProperties(int $userId, array $properties, $isCarrotQuestUser = true): void
    {
        $operations = [];
        foreach ($properties as $key => $value) {
            $operations[] = [
                'op' => 'update_or_create',
                'key' => $key,
                'value' => $value
            ];
        }

        $this->guzzle->request('post', 'v1/users/' . $userId . '/props', [
            RequestOptions::QUERY => [
                'auth_token' => $this->authToken,
                'by_user_id' => $isCarrotQuestUser ? 'false' : 'true',
            ],
            RequestOptions::FORM_PARAMS => [
                'operations' => json_encode($operations),
            ],
        ]);
    }
}
