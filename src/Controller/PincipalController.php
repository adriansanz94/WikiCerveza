<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Cerveza;
use App\Entity\Etiqueta;
use Container5d32ZqV\getEtiquetaRepositoryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PincipalController extends AbstractController
{
    /**
     * @Route("/", name="inicio")
    */
    public function index()
    {
        $rCerveza = $this->getDoctrine()->getRepository(Cerveza::class);

        return $this->render('publicaciones/inicio.html.twig', [
            'cerveza' => $rCerveza->findBy([],null,3)
        ]);
    }

    /**
     * @Route("/Cerveza{id<\d+>}", name="detalle")
     */
    public function detalle(Cerveza $id)
    {
        $rCategoria = $this->getDoctrine()->getRepository(Categoria::class);
        return $this->render('publicaciones/detalle.html.twig',[
            'cerveza' => $id,
            'categoria' => $rCategoria->find($id)
        ]);
    }
    /**
     * @Route("/verMasJson/{offset<\d+>}", name="verMasJson")
     */
    public function verMasJson($offset)
    {
        $rCerveza = $this->getDoctrine()->getRepository(Cerveza::class);
        return $this->json(['cervezas' => $rCerveza->todasCervezas($offset)]);


    }
    /**
     * @Route("/verMas", name="verMas")
     */
    public  function verMas()
    {
        return $this->render("/js/verMas.js");

    }

}
