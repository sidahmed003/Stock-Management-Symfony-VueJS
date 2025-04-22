<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\MongoDbChecker;

class TestController extends AbstractController
{
    #[Route('/test-mongo', name: 'test_mongo')]
    public function testMongo(MongoDbChecker $checker): Response
    {
        $status = $checker->isConnected() ? 'connecté' : 'non connecté';
        return new Response("MongoDB est $status");
    }
}
