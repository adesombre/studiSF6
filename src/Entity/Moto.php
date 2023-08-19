<?php

namespace App\Entity;

use App\Repository\MotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotoRepository::class)]
class Moto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    private ?string $immtriculation = null;

    #[ORM\ManyToOne(inversedBy: 'moto')]
    private ?Modele $modele = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImmtriculation(): ?string
    {
        return $this->immtriculation;
    }

    public function setImmtriculation(string $immtriculation): static
    {
        $this->immtriculation = $immtriculation;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): static
    {
        $this->modele = $modele;

        return $this;
    }
}
