<?php

namespace App\Controller;

use App\Entity\Cerveza;
use App\Entity\Etiqueta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PincipalController extends AbstractController
{
    /*/**
     * @Route("/pincipal", name="pincipal")
     /
    public function index()
    {
        return $this->render('publicaciones/inicio.html.twig', [
            'controller_name' => 'PincipalController',
        ]);
    }*/
    /**
     * @Route("/", name="inicio")
    */
    public function index()
    {
        $rCerveza = $this->getDoctrine()->getRepository(Cerveza::class);

        $rEtiquetas = $this->getDoctrine()->getRepository(Etiqueta::class);
        return $this->render('publicaciones/inicio.html.twig', [
            'cerveza' => $rCerveza->findAll()
            //'etiqueta' => $rEtiquetas->findAll()
        ]);
    }

    /**
     * @Route("/Cerveza{id<\d+>}", name="detalle")
     */
    public function detalle(Cerveza $id)
    {
        return $this->render('publicaciones/detalle.html.twig',[
            'cerveza' => $id
        ]);
    }
    /**
     * @Route("/verMas", name="verMas")
     */
    public function verMasJson()
    {
        return $this->json(['mensaje '=>'hola Mundo' ]);
    }

}
