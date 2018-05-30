<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FicheTableController extends Controller
{
    /**
     * @Route("/fiche/table/{id}", name="fiche_table")
     */
    public function index($id)
    {
        return $this->render('fiche_table/index.html.twig');
    }
}
