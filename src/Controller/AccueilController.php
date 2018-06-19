<?php

namespace App\Controller;

use App\Entity\TableJeu;
use App\Modele\Table;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller implements SessionAuthenticatedController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(Request $request)
    {
        $lastTables=$this->getDoctrine()
            ->getRepository(TableJeu::class)
            ->findBy(array(),array('id'=>'DESC'),3);
        $lastTablesHtml=Table::getTableCard($lastTables);
        $session=$request->getSession();
        $se=$session->get("email");
        return $this->render('accueil/index.html.twig',
            array('lastTable' => $lastTablesHtml));
    }
}
