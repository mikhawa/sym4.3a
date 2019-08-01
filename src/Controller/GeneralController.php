<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use App\Utils\Slugger;

class GeneralController extends AbstractController {

    /**
     * @Route("/", name="homepage")
     */
    public function index() {
        $posts = $this->getDoctrine()
                ->getRepository(Post::class)
                ->findAll();

        return $this->render('general/index.html.twig', [
                    'posts' => $posts,
        ]);
    }

}
