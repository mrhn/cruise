<?php

namespace Cruise\Google\GoogleDrive;

use Google_Client;

class GoogleDrive
{
    /** @var Google_Client $client */
    protected $client;

    public function __construct(string $appName, string $appKey)
    {
        $client = new Google_Client();
        $client->setApplicationName($appName);
        $client->setDeveloperKey($appKey);
    }
}