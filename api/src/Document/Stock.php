<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection: "stock")]
class Stock
{
    #[MongoDB\Id]
    private string $id;

    #[MongoDB\Field(type: "string")]
    private string $type;

    #[MongoDB\Field(type: "int")]
    private int $quantite_initial;

    #[MongoDB\Field(type: "int")]
    private int $quantite_actuel;

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getQuantiteInitial(): int
    {
        return $this->quantite_initial;
    }

    public function setQuantiteInitial(int $quantite_initial): void
    {
        $this->quantite_initial = $quantite_initial;
    }

    public function getQuantiteActuel(): int
    {
        return $this->quantite_actuel;
    }

    public function setQuantiteActuel(int $quantite_actuel): void
    {
        $this->quantite_actuel = $quantite_actuel;
    }
}
