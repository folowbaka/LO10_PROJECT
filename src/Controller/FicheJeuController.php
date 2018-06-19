<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Form\JeuType;
use JMS\SerializerBundle\JMSSerializerBundle;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FicheJeuController extends Controller
{
    /**
     * @Route("/fiche/jeu/{id}", name="fiche_jeu")
     */
    public function index(Jeu $jeu,Request $request)
    {
        $titre=$jeu->getTitre();
        $client   = $this->get('eight_points_guzzle.client.score_apihtml');
        $idJeu=$jeu->getId();
        $description=$jeu->getDescription();
        $descriptionMarkdown="";
        if($description!="")
        {
            $clientMarkdown=$this->get('eight_points_guzzle.client.github_markdown');
            $serializer = $this->get('jms_serializer');
            $header=array("Content-Type"=>"application/json","User-Agent"=>"folowbaka");
            $body=$serializer->serialize(array("text"=>$description,"mode"=>"gfm"), "json");
            $descriptionMarkdown=$clientMarkdown->post("/markdown",array("header"=>$header,"body"=>$body))->getBody()->getContents();
        }
        $link = $this->generateUrl(
            'fiche_jeu', [
            'id'=>$idJeu
        ],
            UrlGeneratorInterface::ABSOLUTE_URL
        );
        $link=\App\Modele\Jeu::transformURI($link);
        $response = $client->get("/vote/$link")->getBody()->getContents();
        return $this->render('fiche_jeu/index.html.twig',array("titre"=>$titre,"vote"=>$response,"idJeu"=>$idJeu,"description"=>$description,"descriptionMarkdown"=>$descriptionMarkdown));
    }
    /**
     * @Route("/fiche/jeu/", name="ajouter_fiche_jeu")
     */
    public function ajouterFiche(Request $request)
    {
        $jeu=new Jeu();
        $form=$this->createForm(JeuType::class,$jeu);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($jeu);
            $entityManager->flush();
            $client   = $this->get('eight_points_guzzle.client.score_api');
            $link = $this->generateUrl(
                'fiche_jeu', [
                'id'=>$jeu->getId()
            ],
                UrlGeneratorInterface::ABSOLUTE_URL
            );
            $link=\App\Modele\Jeu::transformURI($link);
            $response = $client->put("/vote/$link");
        }
        return $this->render('fiche_jeu/ajouter.html.twig',array("form"=>$form->createView()));
    }

    /**
     * @Route("/fiche/jeu/{id}/markdown", name="edit_fiche_jeu_markdown")
     */
    public function editMarkDown(Request $request,$id)
    {
        $jeu=$lastTables=$this->getDoctrine()
            ->getRepository(Jeu::class)
            ->find($id);
        $description=$request->getContent();
        $jeu->setDescription($description);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse("Modification enregistrée",Response::HTTP_OK);

    }
}
