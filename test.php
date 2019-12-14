<?php

use GuzzleHttp\Client;

require_once 'vendor/autoload.php';

$guzzle = new Client([
    'base_uri' => 'https://api.carrotquest.io',
    'debug' => true,
]);

$client = new \alexeevdv\CarrotQuest\Client(
    'app.30464.1c943e3ff1bbdc757adb117fce0efbafabf838eec84122b1',
    $guzzle
);

$client->userGet(11, false);
die();

$client->userSetProperties(11, [
    '$name' => 'John Doe',
    'first_name' => 'John',
    'last_name' => 'Doe',
    '$email' => 'mail@example.org',
    '$phone' => '+79531234567',
], false);

