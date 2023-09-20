<?php

namespace App\DataFixtures;

use App\Entity\Sock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

;

class SockFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $sock1 = new Sock();
        $sock1->setUsername('Benjamin');
        $sock1->setEmail('benjamin.forest@gmail.com');
        $sock1->setPassword($this->hasher->hashPassword($sock1, 'benjamin'));
        $sock1->setStory('Je suis une chaussette');
        $sock1->setIsFound(true);
        $sock1->setIsMatched(false);
        $sock1->setColor($this->getReference('rouge'));
        $sock1->setPattern($this->getReference('rayures'));
        $manager->persist($sock1);
        $this->addReference('sock1', $sock1);

        $sock2 = new Sock();
        $sock2->setUsername('John');
        $sock2->setEmail('john.doe@gmail.com');
        $sock2->setPassword($this->hasher->hashPassword($sock2, 'john'));
        $sock2->setStory('Je suis une chaussette 2');
        $sock2->setIsFound(true);
        $sock2->setIsMatched(false);
        $sock2->setColor($this->getReference('bleu'));
        $sock2->setPattern($this->getReference('carreaux'));
        $manager->persist($sock2);
        $this->addReference('sock2', $sock2);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ColorFixtures::class,
            PatternFixtures::class,
        ];
    }
}
