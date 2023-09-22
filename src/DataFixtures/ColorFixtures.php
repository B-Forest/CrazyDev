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

        $color3 = new Color();
        $color3->setLabel('vert');
        $color3->setTwClass('green');
        $manager->persist($color3);
        $this->addReference('vert', $color3);

        $color4 = new Color();
        $color4->setLabel('jaune');
        $color4->setTwClass('yellow');
        $manager->persist($color4);
        $this->addReference('jaune', $color4);

        $color5 = new Color();
        $color5->setLabel('orange');
        $color5->setTwClass('orange');
        $manager->persist($color5);
        $this->addReference('orange', $color5);

        $manager->flush();
    }
}
