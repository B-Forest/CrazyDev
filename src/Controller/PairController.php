<?php

namespace App\Controller;

use App\Repository\PairRepository;
use App\Repository\SockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PairController extends AbstractController
{
    #[Route('/pair', name: 'app_pair')]
    public function index(PairRepository $pairRepository, SockRepository $sockRepository): Response
    {
        return $this->render('pair/index.html.twig', [
            'pairs' => $pairRepository->findAll(),
        ]);
    }
}
