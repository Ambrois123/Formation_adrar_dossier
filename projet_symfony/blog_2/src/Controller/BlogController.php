<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog', defaults: ['page' => '1'], methods: ['GET'])]

    /**
     * Cette nouvelle route créer un chemin absolue vers mes pages
     */
    #[Route('/page/{page<[1-9]\d{0,8}>}', name: 'app_blog_page', defaults: ['page' => '1'], methods: ['GET'])]

    /**
     * Une fois notre chemin défini, on passe $page en paramaètre à index()
     * $request a été utilse pour récupérer la valeur de page dans l'url
     */

    public function index(int $page): Response
    {

        echo "<pre>";
        print_r($page);
        echo "</pre>";

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController : page '.$page,
        ]);
    }
}
