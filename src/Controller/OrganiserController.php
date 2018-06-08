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
            $serializer=$this->container->get('jms_serializer');
            $client= $this->get('eight_points_guzzle.client.geo_gouv');
            $response=$client->get("/communes?nom=".$ville."&fields=departement");
            $body=$serializer->deserialize($response->getBody()->getContents(),"array","json");
            $codeDepartement=$body[0]["departement"]["code"];
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
