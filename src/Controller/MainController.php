<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/getName/{id}', name: 'app_getName')]
    public function getName(int $id): Response
    {
        $name = 'Имя не найдено';
//      $rr =  $this->u getName($id);

        return new Response( $name );
    }
}
