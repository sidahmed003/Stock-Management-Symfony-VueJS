<?php

namespace App\Service;

use Doctrine\ODM\MongoDB\DocumentManager;
use Psr\Log\LoggerInterface;

class MongoDbChecker
{
    private bool $connected = false;

    public function __construct(DocumentManager $dm, LoggerInterface $logger)
    {
        try {
            // getClient() renvoie l'instance MongoDB\Client
            $client = $dm->getClient();

            // ping vers la base MongoDB
            $client->selectDatabase('admin')->command(['ping' => 1]);

            $this->connected = true;
            $logger->info('✅ MongoDB connecté');
        } catch (\Exception $e) {
            $this->connected = false;
            $logger->error('❌ MongoDB déconnecté : ' . $e->getMessage());
        }
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }
}
