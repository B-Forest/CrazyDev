<?php

namespace App\DataFixtures;

use App\Entity\Pattern;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class PatternFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $pattern1 = new Pattern();
        $pattern1->setPath('/picture/trees.webp');
        $pattern1->setName('sapin');
        $manager->persist($pattern1);
        $this->addReference('sapin', $pattern1);

        $pattern2 = new Pattern();
        $pattern2->setPath('/picture/bananas.webp');
        $pattern2->setName('banane');
        $manager->persist($pattern2);
        $this->addReference('banane', $pattern2);

        $pattern3 = new Pattern();
        $pattern3->setPath('/picture/pink-flowers.webp');
        $pattern3->setName('cerisier');
        $manager->persist($pattern3);
        $this->addReference('cerisier', $pattern3);

        $manager->flush();
    }
}
