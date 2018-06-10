<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Entity\Region;
use App\Form\TableJeuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TableJeu;
use GuzzleHttp\Client;

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
            $ville=$table->getVille();
            $villeExplo=explode(" ",$ville);
            $codePostal=$villeExplo[1];
            $table->setVille($villeExplo[0]);
            $table->setCodePostal($codePostal);
            $codeDepartement=substr($codePostal,0,2);
            $entityManager=$this->getDoctrine()->getManager();
            $departement=$this->getDoctrine()
                ->getRepository(Departement::class)->find($codeDepartement);
            $table->setRegion($departement->getRegion());
            $entityManager->persist($table);
            $entityManager->flush();

            return $this->render('organiser/index.html.twig', array('form'=>$form->createView()
            ));
        }
        return $this->render('organiser/index.html.twig', array('form'=>$form->createView()
        ));
    }
}
