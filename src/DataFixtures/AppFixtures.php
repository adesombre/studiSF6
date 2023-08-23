<?php

namespace App\DataFixtures;
use App\Entity\Cotisation;
use App\Entity\Modele;
use App\Entity\moto;
use App\Entity\Marque;
use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $marque1 = new Marque();
        $marque1->setLibelle('ktm');
        $manager->persist($marque1);
        $marque2 = new Marque();
        $marque2->setLibelle('bmw');
        $manager->persist($marque2);
        $marque3 = new Marque(); $marque1 = new Marque();
        $marque1->setLibelle('ktm');
        $manager->persist($marque1);
        $marque2 = new Marque();
        $marque2->setLibelle('bmw');
        $manager->persist($marque2);
        $marque3 = new Marque();
        $marque3->setLibelle('tryumph');
        $manager->persist($marque3);

        $marque3->setLibelle('tryumph');
        $manager->persist($marque3);

        $moto1 = new Moto();
        $moto1->setImmtriculation('231-23-1');
        $manager->persist($moto1);
        $moto2 = new Moto();
        $moto2->setImmtriculation('456-98-1');
        $manager->persist($moto2);
        $moto3 = new Moto();
        $moto3->setImmtriculation('456-78-7');
        $manager->persist($moto3);

        $modele1 = new Modele();
        $modele1->setLibelle(' 500 ');
        $manager->persist($modele1);
        $modele2 = new Modele();
        $modele2->setLibelle(' 1000 ');
        $manager->persist($modele2);
        $modele3 = new Modele();
        $modele3->setLibelle('2000 ');
        $manager->persist($modele3);

        $cotisation1 = new Cotisation();
        $cotisation1->setAnnee(2020);
        $manager->persist($cotisation1);

         $cotisation2 = new Cotisation();
        $cotisation2->setAnnee(2022);
        $manager->persist($cotisation2);

        






        

        $manager->flush();
    }
}
