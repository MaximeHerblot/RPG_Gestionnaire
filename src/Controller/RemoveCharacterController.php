<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RemoveCharacterController extends AbstractController
{
    /**
     * @Route("/remove/character/{id}", name="app_remove_character")
     */
    public function index(int $id,ManagerRegistry $doctrine): Response
    {
        // $doctrine = $this->getDoctrine();
        $characRepo = new CharacterRepository($doctrine);
        $charactersToDelete = $characRepo->find($id);
        $nomCharacter = $charactersToDelete->getName();
        $em = $doctrine->getManager();
        $em->remove($charactersToDelete);
        $em->flush();
        return $this->render('remove_character/index.html.twig', [
            'nomCharacter' => $nomCharacter,
        ]);
    }
}
