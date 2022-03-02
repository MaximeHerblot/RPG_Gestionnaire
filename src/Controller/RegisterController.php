<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function index(): Response
    {

        $user = new User();
        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }
    /**
     * @Route("/register/complete", name="app_register_complete")
     */
    public function register(ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {
        $post = $_POST;
        $username = $post['username'];
        $password = $post['password'];
        // dd($username,$password);


        $user = new User();
        $user->setEmail($username);

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $password
        );

        $user->setPassword($hashedPassword);


        $em = $doctrine->getManager();
        $em->persist($user);
        
        try {
            $em->flush();
        } catch (\Throwable $e) {
            return $this->render('register/registerNotComplete.html.twig', [
                'message' => "'Le nom d'utilisateur est déjà utilisé'",
                'username' => $username,
            ]);
    
        }



        return $this->render('register/registerComplete.html.twig', [
            'username' => $username,
            'password' => $password,
        ]);





    }
}
