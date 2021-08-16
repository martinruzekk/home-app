<?php

namespace App\Controller;

use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
    }
    /*
    
    public function register(Request $request, UserPasswordHasherInterface $passwordHasherInterface)
    {
        $newUser = new User();
        $newUser->setLastLogin(DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));
        $newUser->setRoles(["ROLE_ADMIN"]);

        $registerForm = $this->createForm(RegisterFormType::class, $newUser);
        $em = $this->getDoctrine()->getManager();

        $registerForm->handleRequest($request);
        if ($registerForm->isSubmitted()) {
            $data = $registerForm->getData();
            dump($data);
            dump($newUser);
            $newUser->setPassword($passwordHasherInterface->hashPassword($newUser, $data));
            dump($newUser);
            die;
        }

        return $this->render('security/register.html.twig', [
            'registerForm' => $registerForm->createView()
        ]);
    }*/
}
