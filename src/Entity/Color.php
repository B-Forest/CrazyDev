<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColorRepository::class)]
class Color
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $tw_class = null;

    #[ORM\ManyToOne(inversedBy: 'color')]
    private ?Sock $Sock = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getTwClass(): ?string
    {
        return $this->tw_class;
    }

    public function setTwClass(string $tw_class): static
    {
        $this->tw_class = $tw_class;

        return $this;
    }
}
