<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
