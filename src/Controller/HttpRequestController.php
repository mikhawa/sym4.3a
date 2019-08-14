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
        $idhasard = random_int(1,300);
        return $this->render('http_request/index.html.twig',["id"=>$idhasard]);
    }
    /**
    * @Route("/http/request/view/{id}", name="voir_un_id", requirements={"id" = "\d+"})
    */
    public function view($id, Request $request)
    {
        $newid = random_int(1,300);
        // si il existe une variable get supplémentaire nommée "test"
        $rtest = $request->query->get("test");
        return $this->render('http_request/view.html.twig',["id"=>$id,"new_id"=>$newid,"test"=>$rtest]);
     }
}
