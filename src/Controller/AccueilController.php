<?php

namespace App\Controller;

use App\Entity\TableJeu;
use App\Modele\Table;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        $lastTables=$this->getDoctrine()
            ->getRepository(TableJeu::class)
            ->findBy(array(),array('id'=>'DESC'),3);
        $lastTablesHtml=Table::getTableCard($lastTables);
        return $this->render('accueil/index.html.twig',
            array('lastTable' => $lastTablesHtml));
    }
}
