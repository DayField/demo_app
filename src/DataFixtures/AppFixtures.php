<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $ad = new Ad();
            $ad->setTitle('Titre_' . $i)
                ->setAuthor(1)
                ->setDescription('test de description')
                ->setPrice(500);
            $manager->persist($ad);
        }
        $manager->flush();
    }
}
