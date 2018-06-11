<?php

namespace App\Controller;

use App\Entity\TableJeu;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FicheTableController extends Controller
{
    /**
     * @Route("/fiche/table/{id}", name="fiche_table")
     */
    public function index(TableJeu $tableJeu)
    {
        $titre=$tableJeu->getTitre();
        $type=$tableJeu->getType()->getNom();
        $organisateur=$tableJeu->getEmailUtilisateur();
        $emailOrga=$organisateur->getEmail();
        $pseudo=$organisateur->getPseudo();
        $description=$tableJeu->getDescription();
        return $this->render('fiche_table/index.html.twig',array('titre'=>$titre,'type'=>$type,'description'=>$description,"emailorga"=>$emailOrga,"pseudo"=>$pseudo));
    }
}
