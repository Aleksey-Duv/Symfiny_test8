<?php

namespace App\Controller;

use App\Entity\Users;
use http\Client\Curl\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

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
    public function getName(int $id, PersistenceManagerRegistry $doctrine): Response
    {
        $name = 'Пользователь отсутствует';
        $User = $doctrine->getRepository(Users::class)->find($id);
        if (isset($User)) {
            $name = $User->getUserName() ;
        }
//dump($User);die;

        return new Response($name );
    }

    #[Route('/setUser', name: 'app_setUser')]
    public function setUser( PersistenceManagerRegistry $doctrine ): Response
    {
       $doctrineManager = $doctrine->getManager();

       $user = new Users();
        $user->setUserId(2)->setUserName('Иванов Пётр');
        $doctrineManager->persist($user);

        $doctrineManager->flush();




        return new Response( 'сохранено' );
    }
}
