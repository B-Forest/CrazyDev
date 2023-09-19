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


    #[ORM\Column(type: Types::TEXT)]
    private ?string $pairStory = null;

    #[ORM\ManyToOne(inversedBy: 'pairs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sock $Sock = null;

    #[ORM\ManyToOne(inversedBy: 'pairss')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sock $OtherSock = null;

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

    public function getSock(): ?Sock
    {
        return $this->Sock;
    }

    public function setSock(?Sock $Sock): static
    {
        $this->Sock = $Sock;

        return $this;
    }

    public function getOtherSock(): ?Sock
    {
        return $this->OtherSock;
    }

    public function setOtherSock(?Sock $OtherSock): static
    {
        $this->OtherSock = $OtherSock;

        return $this;
    }
}
