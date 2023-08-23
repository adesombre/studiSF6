<?php

namespace App\Controller;
use App\Entity\Moto;
use App\Form\MotoType;
use App\Repository\MotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotoController extends AbstractController
{
    #[Route('/moto', name: 'moto_index', methods:['GET'])]
    public function index(MotoRepository $repo): Response
    { 
        $motos=$repo->findAll();
        return $this->render('moto/index.html.twig', [
            'controller_name' => 'MotoController',
            'motos'=>$motos,
        ]);
    }
    #[Route('/moto/{id}', name: 'moto_show',methods:['GET'])]
    public function show(Moto $moto): Response
    { 
        
        return $this->render('moto/show.html.twig', [
            'controller_name' => 'MotoController',
            'moto'=>$moto,
        ]);
    }

    #[Route('/moto/create', name: 'moto_create',methods:['GET'])]
    public function create(Moto $moto): Response
    { 
        $form=$this->createForm(MotoType::class);
        return $this->render('moto/create.html.twig', [
            'controller_name' => 'MotoController',
            'form'=>$form->createView(),
            
        ]);
    }
}
