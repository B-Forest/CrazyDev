<?php

namespace App\DataFixtures;

use App\Entity\Pair;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
;

class PairFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $pair1 = new Pair();
        $pair1->setSock($this->getReference('sock1'));
        $pair1->setOtherSock($this->getReference('sock2'));
        $pair1->setPairStory('Je suis une paire de chaussettes');
        $manager->persist($pair1);
        $this->addReference('pair1', $pair1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SockFixtures::class,
        ];
    }
}
