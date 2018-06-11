<?php

namespace App\Controller;

use App\Authentificator\Authentificator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthenticatorController extends Controller
{
    /**
     * @Route("/auth", name="auth")
     */
    public function auth()
    {
        $authenticator = new Authentificator();
        $res = $authenticator->auth();
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
        ]);
    }

    /**
     * @Route("/verify", name="verify")
     */
    public function verify()
    {
        $authenticator = new Authentificator();
        $res = $authenticator->verify();
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
        ]);
    }
}