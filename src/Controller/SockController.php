<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SockRepository;

class SockController extends AbstractController
{
    #[Route('/lostsock', name: 'app_sock')]
    public function index(SockRepository $sockRepository): Response
    {
        return $this->render('sock/index.html.twig', [
            'socklonelies' => $sockRepository->findLonelySocks()
        ]);
    }
}
