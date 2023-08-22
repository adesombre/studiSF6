<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CotisationController extends AbstractController
{
    #[Route('/cotisation', name: 'app_cotisation')]
    public function index(): Response
    {
        return $this->render('cotisation/index.html.twig', [
            'controller_name' => 'CotisationController',
        ]);
    }
}
