<?php

namespace App\Controller;

use App\Authenticator\Authenticator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AuthenticatorController extends Controller
{
    /**
     * @Route("/portier", name="portier")
     */
    public function portier()
    {
        return $this->render('authentification/index.html.twig');
    }

    /**
     * @Route("/auth/", name="auth")
     */
    public function auth(Request $request)
    {
        $authenticator = new Authenticator();
        $res = $authenticator->auth($request);
        return $res;
    }

    /**
     * @Route("/verify", name="verify")
     */
    public function verify(Request $request)
    {
        $authenticator = new Authenticator();
        $response = $authenticator->verify($request);
        return $this->redirectToRoute("accueil");
    }
}