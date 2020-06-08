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
        // $product = new Product();
        // $manager->persist($product);
        //$cats  = new Categoria();
        //$cats->getNombre();
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
        //for ($indice = 0; $indice < $cats; $indice++)
        $indice = 0;
        foreach ($cats as $cat){
            $c = new Categoria();
            $c->setNombre($cat);
            $c->setDescripcion($desc[$indice]);
            $manager->persist($c);
            $oCats[$cat]=$c;
            $indice = $indice + 1;
        }

        //$etiq = new  Etiqueta();
        //$etiq->getNombre();
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
        $cev->setCategoria($oCats["OTRAS"]);
        $cev->addEtiquetum($oEtis["Tostada"]);
        $cev->addEtiquetum($oEtis["Equilibrada"]);
        $cev->addEtiquetum($oEtis["Dulzona"]);

        $cev1 = new Cerveza();
        $cev1->setNombre("Alhambra Reserva 1925");
        $cev1->setGraduacion(6,4);
        $cev1->setCategoria($oCats["LAGER"]);
        $cev1->addEtiquetum($oEtis["Tostada"]);
        $cev1->addEtiquetum($oEtis["Amarga"]);
        $cev1->addEtiquetum($oEtis["Dulzona"]);

        $cev2 = new Cerveza();
        $cev2->setNombre("Tyris");
        $cev2->setGraduacion(5);
        $cev2->setCategoria($oCats["TRIGO"]);
        $cev2->addEtiquetum($oEtis["Citrico"]);
        $cev2->addEtiquetum($oEtis["Amarga"]);
        $cev2->addEtiquetum($oEtis["Dulzona"]);


        $manager->persist($cev);
        $manager->persist($cev1);
        $manager->persist($cev2);

        $manager->flush();
    }
}
