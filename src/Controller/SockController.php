<?php

namespace App\Controller;

use App\Entity\Pair;
use App\Entity\Sock;
use App\Form\PairsType;
use App\Form\SockFilterType;
use App\Repository\PairRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SockRepository;

class SockController extends AbstractController
{
    #[Route('/lostsock', name: 'app_sock', methods: ['GET', 'POST'])]
    public function index(SockRepository $sockRepository, Request $request): Response
    {
        $form = $this->createForm(SockFilterType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            dump($data);
            $socks = $sockRepository->findByFilter($data);
        } else (
            $socks = $sockRepository->findLonelySocks()
        );
        return $this->render('sock/index.html.twig', [
            'socks' => $socks,
            'filterForm' => $form,
        ]);
    }

    #[Route('/lostsock/{id}', name: 'lost_sock', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function show(Sock $sock, PairRepository $pairRepository, SockRepository $sockRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        //$pair = $pairRepository->getRepository(Product::class)->find($id);

        $form = $this->createForm(PairsType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $pair= new Pair();
            $user = $this->getUser();
            $otherSock = $sockRepository->findOneBy(['id' => $sock->getId()]);
            $firstStory = $user->getStory();
            $secondStory = $otherSock->getStory();
            $fullStory ='Voici nos deux histoires :' . $firstStory . ' ' . $secondStory;
            $user->setIsFound(true);
            $otherSock->setIsFound(true);
            $pair->setSock($user);
            $pair->setotherSock($otherSock);
            $pair->setPairStory($fullStory);
            $entityManager->persist($pair);
            $pairRepository->save($pair, true);

            return $this->redirectToRoute('app_pair');
        }
        $pattern = $sock->getPattern();
      
        return $this->render('/sock/profil.html.twig', [
            'sock' => $sock,
            'forme' => $pattern->getPath(),
            'form' => $form,
        ]);
    }
}