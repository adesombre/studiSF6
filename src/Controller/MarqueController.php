<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MarqueController extends AbstractController
{
    #[Route('/marque', name: 'marque_index',methods:['GET'])]
    public function index(MarqueRepository $repo): Response
    { 
        $marques = $repo->findAll();
        //dd(__METHOD__);
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
            'marques'=> $marques,
        ]);
    }

    #[Route('/marque/{id}', name: 'marque_show', requirements:['id'=> '\d+'],methods:['GET'])]
    public function show(Marque $marque): Response
    {
       // dd(__METHOD__);
        return $this->render('marque/show.html.twig', [
            'controller_name' => 'MarqueController',
            'marque'=>$marque,
        ]);
    }

    #[Route('/marque/create', name: 'marque_create', priority:10 ,requirements:['id'=> '\d+'],methods:['GET','POST'] )]
    public function create(Request $request, MarqueRepository $repo): Response
    {

        $marque = new Marque();
        $form = $this->createForm(MarqueType::class, $marque);
        $form -> handleRequest($request);
        if ($form->isSubmitted()){
            $repo->save($marque, true);      
             return $this->redirectToRoute('marque_index');
        }

        //dd(__METHOD__);
        return $this->render('marque/create.html.twig', [
            'controller_name' => 'MarqueController',
            'form'=> $form->createView(),
        ]);
    }

    #[Route('/marque/{id}/edit', name: 'marque_edit',requirements:['id'=> '\d+'],methods:['GET','POST'] )]
    public function update(): Response
    {
        dd(__METHOD__);
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
        ]);
    }

    #[Route('/marque/{id}/delete', name: 'marque_delete',requirements:['id'=> '\d+'],methods:['GET','DELETE'])]
    public function delete(): Response
    {
        dd(__METHOD__);
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
        ]);
    }



    
}
