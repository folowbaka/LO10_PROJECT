<?php

namespace App\Controller;

use App\Form\TableJeuType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TableJeu;

class OrganiserController extends Controller
{
    /**
     * @Route("/organiser", name="organiser")
     */
    public function index()
    {
        $table=new TableJeu();
        $form=$this->createForm(TableJeuType::class,$table);
        return $this->render('organiser/index.html.twig', array('form'=>$form->createView()
        ));
    }
}
