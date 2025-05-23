<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use Doctrine\ORM\EntityManagerInterface;  // <-- ajouté
use App\Entity\User;                      // <-- ajouté

final class MoniqueController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/monique', name: 'app_monique')]
    public function index(): Response
    {
        return $this->render('monique/index.html.twig', [
            'controller_name' => 'MoniqueController',
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/moniqueAdmin', name: 'app_monique_admin')]
    public function moniqueAdmin(EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();
        return $this->render('monique/admin.html.twig', [
            'users' => $users,
        ]);
    }
}


