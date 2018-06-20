<?php

namespace App\Controller;

use App\Authenticator\Authenticator;
use App\Entity\Utilisateur;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


class AuthenticatorController extends Controller
{
    /**
     * @Route("/portier", name="portier",)
     */
    public function portier(Request $request)
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
        $email=$response->getContent();
        if($email && $response->getStatusCode()==200) {
            $session = new Session();
            $session->set("email", $email);
            $utilisateur=$this->getDoctrine()->getRepository(Utilisateur::class)->find($email);
            if($utilisateur==null)
            {
                $pseudo=explode("@",$email)[0];
                $utilisateur=new Utilisateur($email,$pseudo);
                $entityManager=$this->getDoctrine()->getManager();
                $entityManager->persist($utilisateur);
                $entityManager->flush();
            }
        }
        return $this->redirectToRoute("accueil");
    }
    /**
     * @Route("/disconnect", name="disconnect")
     */
    public  function disconnect(Request $request)
    {
        $request->getSession()->invalidate();
        return $this->redirectToRoute("accueil");
    }
}