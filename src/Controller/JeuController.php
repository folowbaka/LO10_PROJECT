<?php

namespace App\Controller;

use App\Modele\Jeu;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JeuController extends Controller
{
    /**
     * @Route("/jeu", name="jeu")
     */
    public function index()
    {
        $queryRequest="SELECT j
        FROM App\Entity\Jeu j ";
        $queryRequest.=" ORDER BY j.id ASC";
        $entityManager = $this->getDoctrine()->getManager();
        $query=$entityManager->createQuery($queryRequest)->setMaxResults(15);
        $resultJeux=$query->execute();
        $resultJeuxHtml=Jeu::getJeuRow($resultJeux);
        return $this->render('jeu/index.html.twig',array("resultJeuxHtml"=>$resultJeuxHtml));
    }
}
