<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class ColorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $color1 = new Color();
        $color1->setLabel('rouge');
        $color1->setTwClass('red');
        $manager->persist($color1);
        $this->addReference('rouge', $color1);

        $color2 = new Color();
        $color2->setLabel('bleu');
        $color2->setTwClass('blue');
        $manager->persist($color2);
        $this->addReference('bleu', $color2);

        $manager->flush();
    }
}
