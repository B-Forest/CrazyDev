<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SockController extends AbstractController
{
    #[Route('/sock', name: 'app_sock')]
    public function index(): Response
    {
        return $this->render('sock/index.html.twig', [
            'controller_name' => 'SockController',
        ]);
    }
}
