<?php

namespace App\Entity;

use App\Repository\SockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: SockRepository::class)]
class Sock implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column]
    private  ?string $story = null;

    #[ORM\ManyToOne(inversedBy: 'Sock_one')]
    private ?Pair $Pair = null;

    #[ORM\Column]
    private ?bool $isFound = null;

    #[ORM\Column]
    private ?bool $isMatched = null;

    #[ORM\OneToMany(mappedBy: 'sock', targetEntity: Color::class)]
    private \Doctrine\Common\Collections\Collection $Color;

    #[ORM\ManyToOne(inversedBy: 'socks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    #[ORM\OneToMany(mappedBy: 'Sock', targetEntity: Pair::class, orphanRemoval: true)]
    private \Doctrine\Common\Collections\Collection $pairs;

    #[ORM\OneToMany(mappedBy: 'OtherSock', targetEntity: Pair::class, orphanRemoval: true)]
    private \Doctrine\Common\Collections\Collection $pairss;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pattern $pattern = null;

    public function __construct()
    {
        $this->pairs = new ArrayCollection();
        $this->pairss = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPair(): ?Pair
    {
        return $this->Pair;
    }

    public function setPair(?Pair $Pair): static
    {
        $this->Pair = $Pair;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(string $story): self
    {
        $this->story = $story;

        return $this;
    }

    public function isIsFound(): ?bool
    {
        return $this->isFound;
    }

    public function setIsFound(bool $isFound): static
    {
        $this->isFound = $isFound;

        return $this;
    }

    public function isIsMatched(): ?bool
    {
        return $this->isMatched;
    }

    public function setIsMatched(bool $isMatched): static
    {
        $this->isMatched = $isMatched;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): static
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, Pair>
     */
    public function getPairs(): \Doctrine\Common\Collections\Collection
    {
        return $this->pairs;
    }

    public function addPair(Pair $pair): static
    {
        if (!$this->pairs->contains($pair)) {
            $this->pairs->add($pair);
            $pair->setSock($this);
        }

        return $this;
    }

    public function removePair(Pair $pair): static
    {
        if ($this->pairs->removeElement($pair)) {
            // set the owning side to null (unless already changed)
            if ($pair->getSock() === $this) {
                $pair->setSock(null);
            }
        }

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection<int, Pair>
     */
    public function getPairss(): \Doctrine\Common\Collections\Collection
    {
        return $this->pairss;
    }

    public function addPairss(Pair $pairss): static
    {
        if (!$this->pairss->contains($pairss)) {
            $this->pairss->add($pairss);
            $pairss->setOtherSock($this);
        }

        return $this;
    }

    public function removePairss(Pair $pairss): static
    {
        if ($this->pairss->removeElement($pairss)) {
            // set the owning side to null (unless already changed)
            if ($pairss->getOtherSock() === $this) {
                $pairss->setOtherSock(null);
            }
        }

        return $this;
    }

    public function getPattern(): ?Pattern
    {
        return $this->pattern;
    }

    public function setPattern(?Pattern $pattern): static
    {
        $this->pattern = $pattern;

        return $this;
    }
}
