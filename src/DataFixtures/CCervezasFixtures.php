<?php

namespace App\DataFixtures;

use App\Entity\Categoria;
use App\Entity\Cerveza;
use App\Entity\Etiqueta;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CCervezasFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cats = ['LAGER','ALE',"TRIGO","PORTER Y STOUT","OTRAS"];
        $desc = ["Se conoce como lagers a la categoría de cervezas elaboradas por fermentación baja.
                   por tanto, fermentada con una levadura en la parte baja del tanque, a la que luego se le deja madurar en frío, alrededor de 0º C. 
                   Las auténticas lager suelen madurar por un periodo de 2 a 6 meses.",
                "Ale es la palabra inglesa que describe al grupo de cervezas que utilizan levaduras de fermentación alta.
                    Esta característica, frente a las que utilizan levaduras de fermentación baja, es la que marca la distinción entre las dos grandes familias de cervezas: ale y lager.",
                "Son cervezas de fermentación alta elaboradas con una mezcla de trigo y cebada. 
                    El trigo, que puede o no maltearse según la tradición de cada país, da a la cerveza un sabor a grano, como el del pan recién hecho, sobre todo cuando no está malteado.",
                "La cerveza Porter es una cerveza menos amarga, densidades originales más bajas y menor grado de alcohol que las Stout.
                    La cerveza Stout, recibe este nombre por ser la porter más fuerte.
                    La stout es una cerveza de color casi negro, oscura, amarga y elaborada con malta de cebada tostada.",
                "Cualquier otro tipo de cerveza que no encuentres en esta pagina"
            ];
        $oCat = [];
        $indice = 0;
        foreach ($cats as $cat){
            $c = new Categoria();
            $c->setNombre($cat);
            $c->setDescripcion($desc[$indice]);
            $manager->persist($c);
            $oCats[$cat]=$c;
            $indice = $indice + 1;
        }

        $etis = ['Tostada','Equilibrada',"Dulzona","Amarga","Citrico"];
        $oEtis = [];
        foreach ($etis as $eti){
            $e = new Etiqueta();
            $e->setNombre($eti);
            $manager->persist($e);
            $oEtis[$eti]=$e;
        }

        $cev = new Cerveza();
        $cev->setNombre("Voll Damm");
        $cev->setGraduacion(7,2);
        $cev->setCategoria($oCats["PORTER Y STOUT"]);
        $cev->addEtiquetum($oEtis["Tostada"]);
        $cev->addEtiquetum($oEtis["Equilibrada"]);


        $cev1 = new Cerveza();
        $cev1->setNombre("Alhambra Reserva 1925");
        $cev1->setGraduacion(6,4);
        $cev1->setCategoria($oCats["LAGER"]);
        $cev1->addEtiquetum($oEtis["Tostada"]);
        $cev1->addEtiquetum($oEtis["Dulzona"]);

        $cev2 = new Cerveza();
        $cev2->setNombre("Tyris");
        $cev2->setGraduacion(5);
        $cev2->setCategoria($oCats["TRIGO"]);
        $cev2->addEtiquetum($oEtis["Citrico"]);
        $cev2->addEtiquetum($oEtis["Amarga"]);
        $cev2->addEtiquetum($oEtis["Dulzona"]);

        $cev3 = new Cerveza();
        $cev3->setNombre("Amstel");
        $cev3->setGraduacion(7,2);
        $cev3->setCategoria($oCats["PORTER Y STOUT"]);
        $cev3->addEtiquetum($oEtis["Equilibrada"]);
        $cev3->addEtiquetum($oEtis["Dulzona"]);

        $cev4 = new Cerveza();
        $cev4->setNombre("Mahou Clasica");
        $cev4->setGraduacion(6,4);
        $cev4->setCategoria($oCats["LAGER"]);
        $cev4->addEtiquetum($oEtis["Tostada"]);
        $cev4->addEtiquetum($oEtis["Amarga"]);
        $cev4->addEtiquetum($oEtis["Dulzona"]);

        $cev5 = new Cerveza();
        $cev5->setNombre("Mixta");
        $cev5->setGraduacion(5);
        $cev5->setCategoria($oCats["PORTER Y STOUT"]);
        $cev5->addEtiquetum($oEtis["Citrico"]);
        $cev5->addEtiquetum($oEtis["Amarga"]);
        $cev5->addEtiquetum($oEtis["Dulzona"]);

        $cev6 = new Cerveza();
        $cev6->setNombre("Sandy");
        $cev6->setGraduacion(7,2);
        $cev6->setCategoria($oCats["OTRAS"]);
        $cev6->addEtiquetum($oEtis["Tostada"]);
        $cev6->addEtiquetum($oEtis["Equilibrada"]);
        $cev6->addEtiquetum($oEtis["Dulzona"]);

        $cev7 = new Cerveza();
        $cev7->setNombre("Cheapis");
        $cev7->setGraduacion(6,4);
        $cev7->setCategoria($oCats["LAGER"]);
        $cev7->addEtiquetum($oEtis["Tostada"]);
        $cev7->addEtiquetum($oEtis["Amarga"]);
        $cev7->addEtiquetum($oEtis["Dulzona"]);

        $cev8 = new Cerveza();
        $cev8->setNombre("Ladrón de Manzanas");
        $cev8->setGraduacion(4);
        $cev8->setCategoria($oCats["ALE"]);
        $cev8->addEtiquetum($oEtis["Citrico"]);
        $cev8->addEtiquetum($oEtis["Amarga"]);
        $cev8->addEtiquetum($oEtis["Dulzona"]);

        $cev9 = new Cerveza();
        $cev9->setNombre("Voll Damm II");
        $cev9->setGraduacion(7,2);
        $cev9->setCategoria($oCats["OTRAS"]);
        $cev9->addEtiquetum($oEtis["Tostada"]);
        $cev9->addEtiquetum($oEtis["Equilibrada"]);
        $cev9->addEtiquetum($oEtis["Dulzona"]);

        $cev10 = new Cerveza();
        $cev10->setNombre("Bayern Beer");
        $cev10->setGraduacion(6,4);
        $cev10->setCategoria($oCats["ALE"]);
        $cev10->addEtiquetum($oEtis["Tostada"]);


        $cev11 = new Cerveza();
        $cev11->setNombre("Corona");
        $cev11->setGraduacion(4);
        $cev11->setCategoria($oCats["TRIGO"]);
        $cev11->addEtiquetum($oEtis["Amarga"]);
        $cev11->addEtiquetum($oEtis["Dulzona"]);

        $cev12 = new Cerveza();
        $cev12->setNombre("San Miguel");
        $cev12->setGraduacion(3);
        $cev12->setCategoria($oCats["PORTER Y STOUT"]);
        $cev12->addEtiquetum($oEtis["Tostada"]);
        $cev12->addEtiquetum($oEtis["Equilibrada"]);
        $cev12->addEtiquetum($oEtis["Dulzona"]);

        $cev13 = new Cerveza();
        $cev13->setNombre("Pilsener");
        $cev13->setGraduacion(6,4);
        $cev13->setCategoria($oCats["LAGER"]);
        $cev13->addEtiquetum($oEtis["Tostada"]);
        $cev13->addEtiquetum($oEtis["Amarga"]);
        $cev13->addEtiquetum($oEtis["Dulzona"]);

        $cev14 = new Cerveza();
        $cev14->setNombre("Cruzcampo");
        $cev14->setGraduacion(8);
        $cev14->setCategoria($oCats["TRIGO"]);
        $cev14->addEtiquetum($oEtis["Citrico"]);



        $manager->persist($cev);
        $manager->persist($cev1);
        $manager->persist($cev2);
        $manager->persist($cev3);
        $manager->persist($cev4);
        $manager->persist($cev5);
        $manager->persist($cev6);
        $manager->persist($cev7);
        $manager->persist($cev8);
        $manager->persist($cev9);
        $manager->persist($cev10);
        $manager->persist($cev11);
        $manager->persist($cev12);
        $manager->persist($cev13);
        $manager->persist($cev14);

        $manager->flush();
    }
}
