<?php

namespace App\Entity;

use App\Repository\PairRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PairRepository::class)]
class Pair
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'Pair', targetEntity: Sock::class)]
    private Collection $Sock_one;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $pairStory = null;

    public function __construct()
    {
        $this->Sock_one = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getPairStory(): ?string
    {
        return $this->pairStory;
    }

    public function setPairStory(string $pairStory): static
    {
        $this->pairStory = $pairStory;

        return $this;
    }
}
