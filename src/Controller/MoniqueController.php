<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
  
  use Symfony\Component\Security\Http\Attribute\IsGranted;
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


    //fonction exemple
	#[IsGranted('ROLE_ADMIN')]
	#[Route('/moniqueAdmin', name: 'app_monique_admin')]
    public function moniqueAdmin(EntityManagerInterface $entityManager): Response
    {
		//récupération de tous les users
        $users = $entityManager->getRepository(User::class)->findAll();
		//ce return renvoie vers template/monique/admin
		return $this->render('monique/admin.html.twig', [
            'users' => $users,
        ]);
    }
}