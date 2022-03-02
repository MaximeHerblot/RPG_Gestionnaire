<?php

namespace App\Controller;

use App\Entity\Character;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationPersonnageController extends AbstractController
{
    /**
     * @Route("/creation/personnage", name="app_creation_personnage")
     */
    public function index(): Response
    {
        return $this->render('creation_personnage/index.html.twig', [
            'controller_name' => 'CreationPersonnageController',
        ]);
    }

    /**
     * @Route("/creation/personnage/request", name="app_creation_personnage_request")
     */
    public function request(ManagerRegistry $doctrine): Response
    {

        $post = $_POST;
        $characters = new Character(
            $post['nom_personnage'],
            $post['carac_force'],
            $post['carac_dexterite'],
            $post['carac_constitution'],
            $post['carac_intelligence'],
            $post['carac_sagesse'],
            $post['carac_charisme']
        );


        $user = $this->getUser();
        $characters->setUser($user);
        $em = $doctrine->getManager();
        $em->persist($characters);
        $em->flush();

        return $this->render('creation_personnage/creationCharactersComplete.html.twig', [
            'Characters_name' => $post['nom_personnage'],
        ]);
    }
}
