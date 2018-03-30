<?php

namespace Cruise\Google\GoogleDrive;

use Google_Client;

class GoogleDrive
{
    protected $client;

    public function __construct($appName, $appKey)
    {
        $client = new Google_Client();
        $client->setApplicationName($appName);
        $client->setDeveloperKey($appKey);
    }
}