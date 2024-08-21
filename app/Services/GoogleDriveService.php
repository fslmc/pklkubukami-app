<?php

namespace App\Services;

use Google\Client;
use Google\Service\Drive;

class GoogleDriveService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('Kubukami');
        $this->client->setScopes([Drive::DRIVE_FILE]);
        $this->client->setAuthConfig(config_path('service-account.json')); // Use the service account key
        // $this->client->setAuthConfig(config_path('client_secret.json'));
        $this->client->setAccessType('offline');
    }

    public function getService()
    {
        return new Drive($this->client);
    }

    public function uploadFile($file, $folderId = null)
    {
        $driveService = $this->getService();

        $fileMetadata = new \Google\Service\Drive\DriveFile([
            'name' => $file->getClientOriginalName(),
            'parents' => $folderId ? [$folderId] : null,
        ]);

        $content = file_get_contents($file->getPathname());

        $uploadedFile = $driveService->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
            'fields' => 'id',
        ]);

        return $uploadedFile;
    }
}
