<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(): Response
    {
        $list_characters = [];
        if ($user = $this->getUser()){
            
            $list_characters = $user->getCharacters()->toArray();

        }

        return $this->render('accueil/index.html.twig', [
            'list_characters' => $list_characters,    
        ]);
    }
}
