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
        $pattern1->setPath('rayures');
        $manager->persist($pattern1);
        $this->addReference('rayures', $pattern1);

        $pattern2 = new Pattern();
        $pattern2->setPath('carreaux');
        $manager->persist($pattern2);
        $this->addReference('carreaux', $pattern2);

        $pattern3 = new Pattern();
        $pattern3->setPath('pois');
        $manager->persist($pattern3);
        $this->addReference('pois', $pattern3);

        $manager->flush();
    }
}
