<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnnonceController extends Controller
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index()
    {
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
        ]);
    }
    /**
     * @Route("/annonce/recherche/{localisation}", name="rechercheAnnonce")
     */
    public function recherche($localisation="france")
    {
        return $this->render('annonce/recherche.html.twig', [
            'controller_name' => 'AnnonceController',
        ]);
    }
}
