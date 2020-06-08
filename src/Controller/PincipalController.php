<?php

namespace App\Controller;

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
    /* $rCervezas = $this->getDoctrine()->getRepository(Cerveza::class);
    $rUsuario = $this->getDoctrine()->getRepository(Usuario::class);
    $rCategoria = $this->getDoctrine()->getRepository(Categoria::class);*/


    /* return $this->render('principal/index.html.twig', [
    'ciclos' => $rCiclo->findAll(),
    'profesores' => $rProfesor->findAll(),
    'modulos' => $rModulo->findAll()
    ]);*/
    return $this->render('publicaciones/inicio.html.twig');
    }

    /**
     * @Route("/agregar", name="agregar")
     */
    public function agregar()
    {
        return $this->render('/privado/index.html.twig');
    }

}
