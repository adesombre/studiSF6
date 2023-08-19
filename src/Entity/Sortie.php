<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SortieRepository::class)]
class Sortie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $lieudesortie = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datedesortie = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuduRDV = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLieudesortie(): ?string
    {
        return $this->lieudesortie;
    }

    public function setLieudesortie(string $lieudesortie): static
    {
        $this->lieudesortie = $lieudesortie;

        return $this;
    }

    public function getDatedesortie(): ?\DateTimeInterface
    {
        return $this->datedesortie;
    }

    public function setDatedesortie(\DateTimeInterface $datedesortie): static
    {
        $this->datedesortie = $datedesortie;

        return $this;
    }

    public function getLieuduRDV(): ?string
    {
        return $this->lieuduRDV;
    }

    public function setLieuduRDV(string $lieuduRDV): static
    {
        $this->lieuduRDV = $lieuduRDV;

        return $this;
    }
}
