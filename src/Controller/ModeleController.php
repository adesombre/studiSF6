<?php

namespace App\Controller;
use App\Entity\Modele;
use App\Repository\ModeleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModeleController extends AbstractController
{
    #[Route('/modele', name: 'modele_index', methods:['GET'])]
    public function index(ModeleRepository $repo): Response
    {
        $modeles =$repo->findAll();
        return $this->render('modele/index.html.twig', [
            'controller_name' => 'Modele',
            'modeles'=>$modeles,
        ]);
    }
    #[Route('/modele/{id}', name: 'modele_show', methods:['GET'])]
    public function show(Modele $modele): Response
    {
        
        return $this->render('modele/show.html.twig', [
            'controller_name' => 'Modele',
            'modele'=>$modele,
        ]);
    }
}
