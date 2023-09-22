<?php

namespace App\Controller;

use App\Entity\Pair;
use App\Form\PairsType;
use App\Repository\PairRepository;
use App\Repository\SockRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/pair/{id}', name: 'pair_show', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function show(Pair $pair, PairRepository $pairRepository, ): Response
    {

        return $this->render('/pair/profil.html.twig', [
            'pair' => $pair,
        ]);
    }
}
