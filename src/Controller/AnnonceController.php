<?php

namespace App\Controller;

use App\Entity\Region;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TableJeu;
use App\Modele\Table;

class AnnonceController extends Controller
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index()
    {
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
        ]);
    }
    /**
     * @Route("/annonce/recherche/{region}", name="rechercheAnnonce")
     */
    public function recherche(Region $region)
    {
        $localisation=$region->getId();
        $regionNom=$region->getNom();
        $zoneRecherche=array("near"=>"Autour de moi", "france"=>"Toute la France");
        $selectZone="";
        if($localisation!="france" && $localisation!="near")
        {
            $zoneRecherche[$localisation]=$regionNom;
            $filter["region"]=$localisation;
        }
        foreach ($zoneRecherche as $zone)
        {
            if($zone==$regionNom)
                $selectZone.="<option selected>$zone</option>";
            else
                $selectZone.="<option>$zone</option>";
        }
        $departements=$region->getDepartements();
        if(count($departements)>0)
        {
            $selectZone .= "<optgroup label=\"Departements\">";
            foreach ($departements as $dep) {
                $selectZone .= "<option>" . $dep->getNom() . "</option>";
            }
            $selectZone .= "</optgroup>";
        }
        $filter=array();
        $resultsTables=$this->getDoctrine()
            ->getRepository(TableJeu::class)
            ->findBy($filter,array('id'=>'DESC'),15);
        $resultsTablesHtml=Table::getTableRow($resultsTables);
        return $this->render('annonce/recherche.html.twig',array("selectZoneHtml"=>$selectZone,"resultTables"=>$resultsTablesHtml)
        );
    }
}
