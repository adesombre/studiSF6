<?php

namespace App\DataFixtures;

use App\Entity\Modele;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $modele1 = new Modele();
        $modele1->setLibelle('1000');
        $manager->persist($modele1);
        $modele2 = new Modele();
        $modele2->setLibelle('1500');
        $manager->persist($modele2);
        $modele3 = new Modele();
        $modele3->setLibelle('2000');
        $manager->persist($modele3);





        

        $manager->flush();
    }
}
