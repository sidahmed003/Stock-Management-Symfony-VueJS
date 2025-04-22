<?php

namespace App\Controller;

use App\Document\Stock;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/stock')]
class StockController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function index(DocumentManager $dm): JsonResponse
    {
        $stocks = $dm->getRepository(Stock::class)->findAll();

        $data = array_map(fn($stock) => [
            'id' => $stock->getId(),
            'type' => $stock->getType(),
            'quantite_initial' => $stock->getQuantiteInitial(),
            'quantite_actuel' => $stock->getQuantiteActuel(),
        ], $stocks);

        return $this->json($data);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, DocumentManager $dm): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $stock = new Stock();
        $stock->setType($data['type']);
        $stock->setQuantiteInitial($data['quantite_initial']);
        $stock->setQuantiteActuel($data['quantite_actuel']);

        $dm->persist($stock);
        $dm->flush();

        return $this->json(['message' => 'Stock ajouté', 'id' => $stock->getId()]);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function update(string $id, Request $request, DocumentManager $dm): JsonResponse
    {
        $stock = $dm->getRepository(Stock::class)->find($id);
        if (!$stock) {
            return $this->json(['message' => 'Introuvable'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $stock->setType($data['type'] ?? $stock->getType());
        $stock->setQuantiteInitial($data['quantite_initial'] ?? $stock->getQuantiteInitial());
        $stock->setQuantiteActuel($data['quantite_actuel'] ?? $stock->getQuantiteActuel());

        $dm->flush();

        return $this->json(['message' => 'Stock mis à jour']);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(string $id, DocumentManager $dm): JsonResponse
    {
        $stock = $dm->getRepository(Stock::class)->find($id);
        if (!$stock) {
            return $this->json(['message' => 'Introuvable'], 404);
        }

        $dm->remove($stock);
        $dm->flush();

        return $this->json(['message' => 'Stock supprimé']);
    }
}
