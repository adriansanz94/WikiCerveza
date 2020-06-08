<?php

namespace App\DataFixtures;

use App\Entity\Etiqueta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtiquetasFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        /*$eti = new Etiqueta();
        $eti->setNombre("Rubia");

        $eti1 = new Etiqueta();
        $eti1->setNombre("Tostada");

        $eti2 = new Etiqueta();
        $eti2->setNombre("negra");

        $eti3 = new Etiqueta();
        $eti3->setNombre("Amarga");

        $eti4 = new Etiqueta();
        $eti4->setNombre("Alta Graduacion");

        $eti5 = new Etiqueta();
        $eti5->setNombre("Suave");

        $eti6 = new Etiqueta();
        $eti6->setNombre("Citrica");

        $eti7 = new Etiqueta();
        $eti7->setNombre("Dulzona");

        $eti8 = new Etiqueta();
        $eti8->setNombre("Afrutada");

        $eti9 = new Etiqueta();
        $eti9->setNombre("Equilibrada");

        $manager->persist($eti);
        $manager->persist($eti1);
        $manager->persist($eti2);
        $manager->persist($eti3);
        $manager->persist($eti4);
        $manager->persist($eti5);
        $manager->persist($eti6);
        $manager->persist($eti7);
        $manager->persist($eti8);
        $manager->persist($eti9);

        $manager->flush();*/
    }
}
