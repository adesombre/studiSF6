<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    #[Route('/sortie', name: 'sortie_index',methods:['GET'])]
    public function index(SortieRepository $repo): Response
    {
        $sorties = $repo->findAll();
        
        return $this->render('sortie/index.html.twig', [
            'controller_name' => 'SortieController',
            'sorties'=>$sorties,
        ]);
    }

    #[Route('/sortie /{id}', name: 'sortie_show',methods:['GET'])]
    public function show(Sortie $sortie): Response
    {
        
        return $this->render('sortie/show.html.twig', [
            'controller_name' => 'SortieController',
            'sortie'=>$sortie,
        ]);
    }
    
    #[Route('/sortie/create', name: 'sortie_create',methods:['GET','POST'])]
    public function create(Request $request, SortieRepository $repo): Response
    {
        $sortie =new Sortie();
        $form = $this->createForm(SortieType::class,$sortie);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $repo->save($sortie, true);
            return $this->redirectToRoute('sortie_index');
        }

        

        return $this->render('sortie/create.html.twig', [
            'controller_name' => 'SortieController',
            'form'=>$form->createView(),
            
        ]);

    }


}
