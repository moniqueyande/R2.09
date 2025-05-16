<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MoniqueController extends AbstractController
{
    #[Route('/monique', name: 'app_monique')]
    public function index(): Response
    {
        return $this->render('monique/index.html.twig', [
            'controller_name' => 'MoniqueController',
        ]);
    }
}
