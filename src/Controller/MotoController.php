<?php

namespace App\Controller;
use App\Entity\Moto;
use App\Form\MotoType;
use App\Repository\MotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/moto/create', name: 'moto_create',priority:10,methods:['GET'])]
    public function create(Request $request,MotoRepository $repo): Response
    { 

        $moto = new Moto();
        $form=$this->createForm(MotoType::class, $moto);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $repo->save($moto, true);
            return $this->redirectToRoute('moto_index');
        }
        return $this->render('moto/create.html.twig', [
            'controller_name' => 'MotoController',
            'form'=>$form->createView(),
            
        ]);
    }
}
