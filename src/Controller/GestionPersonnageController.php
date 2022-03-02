<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionPersonnageController extends AbstractController
{
    /**
     * @Route("/gestion/personnage", name="app_gestion_personnage")
     */
    public function index(): Response
    {


        //Récupération des personnages de l'utilisateur
        
        $user = $this->getUser();
        $list_characters = [];
        if ($user){

            $list_characters = $user->getCharacters()->toArray();
        }

        // dd($list_characters->toArray());

        return $this->render('gestion_personnage/index.html.twig', [
            'list_characters' => $list_characters,
        ]);
    }
}
