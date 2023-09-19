<?php

namespace App\Entity;

use App\Repository\ColorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'color', targetEntity: Sock::class)]
    private Collection $socks;

    public function __construct()
    {
        $this->socks = new ArrayCollection();
    }


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

    /**
     * @return Collection<int, Sock>
     */
    public function getSocks(): Collection
    {
        return $this->socks;
    }

    public function addSock(Sock $sock): static
    {
        if (!$this->socks->contains($sock)) {
            $this->socks->add($sock);
            $sock->setColor($this);
        }

        return $this;
    }

    public function removeSock(Sock $sock): static
    {
        if ($this->socks->removeElement($sock)) {
            // set the owning side to null (unless already changed)
            if ($sock->getColor() === $this) {
                $sock->setColor(null);
            }
        }

        return $this;
    }
}
