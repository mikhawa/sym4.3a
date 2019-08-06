<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class SecondController extends AbstractController
{
    /**
     * @Route("/second/{page}", name="second", requirements={"page" = "\d+"}, defaults={"page" = 1})
     */
    public function index(RouterInterface $router)
    {
        $url = $router->generate(
        'second', // 1er argument : le nom de la route
        ['page' => mt_rand(1,30)]       // 2e argument : les paramètres
    );
        return $this->render('second/index.html.twig', [
            'page' => $url,
        ]);
    }
}
