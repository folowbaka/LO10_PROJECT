<?php

namespace App\Controller;

use App\Form\TableJeuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TableJeu;

class OrganiserController extends Controller
{
    /**
     * @Route("/organiser", name="organiser")
     */
    public function index(Request $request)
    {
        $table=new TableJeu();
        $form=$this->createForm(TableJeuType::class,$table);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($table);
            $entityManager->flush();

            return $this->render('organiser/index.html.twig', array('form'=>$form->createView()
            ));
        }
        return $this->render('organiser/index.html.twig', array('form'=>$form->createView()
        ));
    }
}
