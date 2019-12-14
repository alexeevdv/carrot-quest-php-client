<?php

namespace tests\unit;

use alexeevdv\CarrotQuest\Client;
use Codeception\Stub\Expected;
use Codeception\Test\Unit;
use GuzzleHttp\ClientInterface;

class ClientTest extends Unit
{
    public function testUserSetPropertiesRequestSent()
    {
        $guzzle = $this->makeEmpty(ClientInterface::class, [
            'request' => Expected::once(function ($method, $uri, $options) {
                $this->assertEquals('post', $method);
                $this->assertEquals('v1/users/777/props', $uri);
                $this->assertEquals([
                    'query' => [
                        'auth_token' => 'MY_AUTH_TOKEN',
                        'by_user_id' => 'true',
                    ],
                    'form_params' => [
                        'operations' => json_encode([
                            [
                                'op' => 'update_or_create',
                                'key' => '$name',
                                'value' => 'John',
                            ]
                        ]),
                    ],
                ], $options);
            })
        ]);

        $client = new Client('MY_AUTH_TOKEN', $guzzle);
        $client->userSetProperties(777, ['$name' => 'John'], false);
    }
}
