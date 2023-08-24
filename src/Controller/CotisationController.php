<?php

namespace App\Controller;

use App\Entity\Cotisation;
use App\Form\CotisationType;
use App\Repository\CotisationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

     #[Route('/cotisation/create', name: 'cotisation_create',priority: 10, methods:['GET','POST'])]
    public function create(Request $request, CotisationRepository $repo): Response
    {

        $cotisation= new Cotisation();
        $form= $this->createForm(CotisationType::class, $cotisation);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $repo->save($cotisation ,true);
            return $this->redirectToRoute('cotisation_index');
        }
        return $this->render('cotisation/create.html.twig', [
            'controller_name' => 'CotisationController',
            'form'=>$form->createView(),
            
        ]);
    }

}
