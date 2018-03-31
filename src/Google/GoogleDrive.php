<?php

namespace Cruise\Google;

use Google_Client;

class GoogleDrive
{
    /** @var Google_Client $client */
    protected $client;

    public function __construct(string $accessToken)
    {
        $this->client = new Google_Client();
        $this->client->setAccessToken($accessToken);
    }

    public function files()
    {
        $driveService = new \Google_Service_Drive($this->client);
        $files = [];

        $pageToken = null;
        do {
            $response = $driveService->files->listFiles(array(
                'spaces' => 'drive',
                'pageToken' => $pageToken,
                'fields' => 'nextPageToken, files(id, name)',
            ));
            foreach ($response->files as $file) {
                $files[] = $file;
                //printf("Found file: %s (%s)\n", $file->name, $file->id);
            }

            $pageToken = $response->pageToken;
        } while ($pageToken != null);

        return $files;
    }
}