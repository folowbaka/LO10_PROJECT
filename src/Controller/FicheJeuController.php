<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Form\JeuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FicheJeuController extends Controller
{
    /**
     * @Route("/fiche/jeu/{id}", name="fiche_jeu")
     */
    public function index(Jeu $jeu)
    {
        $titre=$jeu->getTitre();
        return $this->render('fiche_jeu/index.html.twig',array("titre"=>$titre));
    }
    /**
     * @Route("/fiche/jeu/", name="ajouter_fiche_jeu")
     */
    public function ajouterFiche(Request $request)
    {
        $jeu=new Jeu();
        $form=$this->createForm(JeuType::class,$jeu);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($jeu);
            $entityManager->flush();
        }
        return $this->render('fiche_jeu/ajouter.html.twig',array("form"=>$form->createView()));
    }
}
