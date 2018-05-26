<?php

namespace App\Controller;

use App\Entity\TableJeu;
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
            ->findBy(array(),array('id'=>'DESC'),10);
        return $this->render('accueil/index.html.twig',
            array('controller_name' => 'AccueilController'));
    }
}
