<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;

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

    /**
     * @Route("/post/{slug}", name="detailPost")
     */
    public function viewPost($slug) {
        /* $post = $this->getDoctrine()
          ->getRepository(Post::class)
          ->findBySlug($slug); */
        $post = $this->getDoctrine()
                ->getRepository(Post::class)
                ->findOneBy(["slug" => $slug]);

        return $this->render('general/detailpost.html.twig', [
                    'fpost' => $post,
        ]);
    }

    /**
     * @Route("/{year}/{slug}.{format}", name="testLaRoute", requirements={
     *   "year"   = "\d{4}",
     *   "format" = "html|xml"
     * }, defaults={"format" = "html"})
     */
    public function testRouting($year, $slug, $format) {
        return new Response(
                "<html><body>On pourrait afficher l'annonce correspondant au
    slug '" . $slug . "', créée en " . $year . " et au format " . $format . ".<br>Ici il s'agit de texte et d'html non valide<br>Twig n'est pas utilisé dans ce cas<br><a href='../'>Accueil</a></body></html>"
        );
    }

}
