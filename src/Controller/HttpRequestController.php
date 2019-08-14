<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// for http
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HttpRequestController extends AbstractController
{
    /**
     * @Route("/http/request", name="http_request_home")
     */
    public function index()
    {
        return $this->render('http_request/index.html.twig', [
            'controller_name' => 'HttpRequestController',
        ]);
    }
}
