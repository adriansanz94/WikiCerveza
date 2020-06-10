<?php

namespace App\Controller;

use App\Entity\Cerveza;
use App\Entity\Etiqueta;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        //$cerve3 = $this->findBy($rCerveza,'asc',3);
        $rEtiquetas = $this->getDoctrine()->getRepository(Etiqueta::class);
        return $this->render('publicaciones/inicio.html.twig', [
            'cerveza' => $rCerveza->findAll()
            //'cerveza' => $cerve3->findAll()
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
     * @Route("/verMasJson", name="verMasJson")
     */
    public function verMasJson()
    {

        $hola=['Hola','mundo','ajax',['voy','a','aprobar','si ','o ','si']];


        $cerveza = $this->getDoctrine()
            ->getRepository(Cerveza::class)
            ->createQueryBuilder('c')
            ->select('c')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return  new JsonResponse($cerveza);

        //return  new JsonResponse($cerveza);
        //return $this->json(['cervezas '=>'hola']);
        //return $this->json(['mensaje '=>$hola ]);


    }
    /**
     * @Route("/verMas", name="verMas")
     */
    public  function verMas()
    {
        return $this->render("/js/verMas.js");

    }

}
