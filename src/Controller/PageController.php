<?php

namespace App\Controller;

use App\Form\PaketFormType;
use App\Form\ServiceFormType;
use App\Repository\KatalogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
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
    public function katalog(KatalogRepository $repository): Response
    {
        $listBarang = $repository->findAll();
        return $this->render('page/katalog.html.twig', [
            'items' => $listBarang,
        ]);
    }

    #[Route('/paket', name: 'paket_page')]
    #[IsGranted("ROLE_USER")]
    public function paket(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PaketFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $paket = $form->getData();
            $entityManager->persist($paket);
            $entityManager->flush();
        }

        return $this->render('page/paket.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/service', name: 'service_page')]
    #[IsGranted("ROLE_USER")]
    public function serviceForm(Request $request, EntityManagerInterface $entityManager, Security $security): Response
    {
        $form = $this->createForm(ServiceFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();
            /**
             * @var \App\Entity\User $user
             */
            $user = $security->getUser();
            $service->setUser($user);

            $entityManager->persist($service);
            $entityManager->flush();

            $this->addFlash('success', 'Jadwal service berhasil ditambahkan, tim kami akan segera otw');
            return $this->redirectToRoute('service_page');
        }

        return $this->render('page/service.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
