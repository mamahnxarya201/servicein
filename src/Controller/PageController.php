<?php

namespace App\Controller;

use App\Form\PaketFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class PageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    #[IsGranted("ROLE_USER")]
    public function index(): Response
    {
        return $this->render('page/home.html.twig');
    }

    #[Route('/katalog', name: 'katalog_page')]
    #[IsGranted("ROLE_USER")]
    public function katalog(): Response
    {
        return $this->render('page/katalog.html.twig');
    }

    #[Route('/paket', name: 'paket_page')]
    #[IsGranted("ROLE_USER")]
    public function paket(): Response
    {
        return $this->render('page/paket.html.twig', [
            'form' => $this->createForm(PaketFormType::class)->createView()
        ]);
    }
}
