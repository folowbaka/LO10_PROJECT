<?php

namespace App\Controller;

use App\Form\TableType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Table;

class OrganiserController extends Controller
{
    /**
     * @Route("/organiser", name="organiser")
     */
    public function index()
    {
        $table=new Table();
        $form=$this->createForm(TableType::class,$table);
        return $this->render('organiser/index.html.twig', array('form'=>$form->createView()
        ));
    }
}
