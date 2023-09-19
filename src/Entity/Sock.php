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

    #[ORM\OneToMany(mappedBy: 'sock', targetEntity: Pattern::class)]
    private \Doctrine\Common\Collections\Collection $Pattern;

    public function __construct()
    {
        $this->color = new ArrayCollection();
        $this->pattern = new ArrayCollection();
        $this->Color = new ArrayCollection();
        $this->Pattern = new ArrayCollection();
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
}
