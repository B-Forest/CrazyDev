<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SockRepository;
use App\Repository\PairRepository;
use App\Entity\Sock;

class SockController extends AbstractController
{
    #[Route('/lostsock', name: 'app_sock')]
    public function index(SockRepository $sockRepository): Response
    {
        return $this->render('sock/index.html.twig', [
            'socklonelies' => $sockRepository->findLonelySocks()
        ]);
    }

    #[Route('/lostsock/{id}', name: 'lost_sock', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(Sock $sock, PairRepository $pairRepository): Response
    {
        //$pair = $pairRepository->getRepository(Product::class)->find($id);
        $pattern = $sock->getPattern();
        
        return $this->render('/sock/profil.html.twig', [
            'sock' => $sock,
            'forme' => $pattern->getPath(),

        ]);
    }
}
