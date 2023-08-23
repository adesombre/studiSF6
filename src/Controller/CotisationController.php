<?php

namespace App\Controller;

use App\Entity\Cotisation;
use App\Repository\CotisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CotisationController extends AbstractController
{
    #[Route('/cotisation', name: 'cotisation_index', methods:['GET'])]
    public function index(CotisationRepository $repo): Response
    {
        $cotisations =$repo->findAll();
        return $this->render('cotisation/index.html.twig', [
            'controller_name' => 'CotisationController',
            'cotisations'=>$cotisations,
        ]);
    }

     #[Route('/cotisation/{id}', name: 'cotisation_show', methods:['GET'])]
    public function show(Cotisation $cotisation): Response
    {
        
        return $this->render('cotisation/show.html.twig', [
            'controller_name' => 'CotisationController',
            'cotisation'=>$cotisation,
        ]);
    }

     #[Route('/cotisation/create', name: 'cotisation_create', methods:['GET','POST'])]
    public function create(Cotisation $cotisation): Response
    {
        $form= $this->createForm(CotisationType::class);
        return $this->render('cotisation/show.html.twig', [
            'controller_name' => 'CotisationController',
            'form'=>$form->createView(),
            
        ]);
    }

}
