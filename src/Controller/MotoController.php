<?php

namespace App\Controller;

use App\Repository\MotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MotoController extends AbstractController
{
    #[Route('/moto', name: 'moto_index')]
    public function index(MotoRepository $repo): Response
    { 
        $motos=$repo->findAll();
        return $this->render('moto/index.html.twig', [
            'controller_name' => 'MotoController',
            'motos'=>$motos,
        ]);
    }
}
