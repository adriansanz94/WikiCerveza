<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoriasFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        /*$cat = new Categoria();
        $cat->setNombre("LAGER");
        $cat->setDescripcion("Se conoce como lagers a la categoría de cervezas elaboradas por fermentación baja.
                               por tanto, fermentada con una levadura en la parte baja del tanque, a la que luego se le deja madurar en frío, alrededor de 0º C. 
                               Las auténticas lager suelen madurar por un periodo de 2 a 6 meses."
        );
        $cat1 = new Categoria();
        $cat1->setNombre("ALE");
        $cat1->setDescripcion("Ale es la palabra inglesa que describe al grupo de cervezas que utilizan levaduras de fermentación alta.
                                Esta característica, frente a las que utilizan levaduras de fermentación baja, es la que marca la distinción entre las dos grandes familias de cervezas: ale y lager."
        );
        $cat2 = new Categoria();
        $cat2->setNombre("TRIGO");
        $cat2->setDescripcion("Son cervezas de fermentación alta elaboradas con una mezcla de trigo y cebada. 
                                El trigo, que puede o no maltearse según la tradición de cada país, da a la cerveza un sabor a grano, como el del pan recién hecho, sobre todo cuando no está malteado."
        );
        $cat3 = new Categoria();
        $cat3->setNombre("PORTER Y STOUT");
        $cat3->setDescripcion("La cerveza Porter es una cerveza menos amarga, densidades originales más bajas y menor grado de alcohol que las Stout.
                                        La cerveza Stout, recibe este nombre por ser la porter más fuerte. 
                                        La stout es una cerveza de color casi negro, oscura, amarga y elaborada con malta de cebada tostada."
        );
        $cat4 = new Categoria();
        $cat4->setNombre("OTRAS");
        $cat4->setDescripcion("Cualquier otro tipo de cerveza que no encuentres en esta pagina");


        $manager->persist($cat);
        $manager->persist($cat1);
        $manager->persist($cat2);
        $manager->persist($cat3);
        $manager->persist($cat4);

        $manager->flush();*/
    }
}
