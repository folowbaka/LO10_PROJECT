<?php

namespace App\Controller;

use App\Entity\Departement;
use App\Entity\Region;
use App\Entity\TableJeuType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TableJeu;
use App\Modele\Table;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/annonce/recherche/{region}/{departement}", name="rechercheAnnonce")
     */
    public function recherche(Region $region,Request $request,$departement="")
    {

        $localisation=$region->getId();
        $regionNom=$region->getNom();
        $zoneRecherche=array("near"=>"Autour de moi", "france"=>"Toute la France");
        $selectZone="";
        $filter=array();
        $queryRequest="SELECT t
        FROM App\Entity\TableJeu t ";
        if($localisation!="france" && $localisation!="near")
        {
            $zoneRecherche[$localisation]=$regionNom;
            if($departement=="")
            {
                $filter["region"] = $localisation;
                $queryRequest.="WHERE t.region = :region";
            }
            else
            {
                $filter["codePostal"]="$departement";
                $queryRequest.="WHERE SUBSTRING(t.codePostal,1,2) = :codePostal";
            }
        }
        $fuck=$request->query;
        $searchTitre = $request->query->get('searchTable');
        $typeSearch = $request->query->get("selectTypeJeu");
        if($typeSearch!="" && $typeSearch!="all")
        {
            $queryRequest.=" AND t.type= :typeJeu";
            $filter["typeJeu"]=$typeSearch;
        }
        if($searchTitre!="")
        {
            $queryRequest.=" AND t.titre LIKE :searchTitre";
            $filter["searchTitre"]="%".$searchTitre."%";
        }
        foreach ($zoneRecherche as $key=>$zone)
        {
            if($zone==$regionNom && $departement=="")
                $selectZone.="<option value='$key' selected>$zone</option>";
            else
                $selectZone.="<option value='$key'>$zone</option>";
        }
        $departements=$region->getDepartements();
        if(count($departements)>0)
        {
            $selectZone .= "<optgroup label=\"Departements\">";
            foreach ($departements as $dep) {
                $codeDep=$dep->getCode();
                if($codeDep==$departement)
                    $selectZone .= "<option selected value='".$dep->getCode()."'>". $dep->getNom() ."</option>";
                else
                    $selectZone .= "<option value='".$dep->getCode()."'>". $dep->getNom() ."</option>";

            }
            $selectZone .= "</optgroup>";
        }
        $queryRequest.=" ORDER BY t.id ASC";
        $entityManager = $this->getDoctrine()->getManager();
        $query=$entityManager->createQuery($queryRequest)->setParameters($filter)->setMaxResults(15);
        $resultsTables=$query->execute();
        $typesjeu= $this->getDoctrine()
            ->getRepository(TableJeuType::class)
            ->findBy(array());
        $typesjeuHtml="";
        foreach ($typesjeu as $type)
        {
            $valType=$type->getId();
            $nomType=$type->getNom();
            $typesjeuHtml.="<option value='$valType'>$nomType</option>";
        }
        $resultsTablesHtml=Table::getTableRow($resultsTables);
        return $this->render('annonce/recherche.html.twig',array("selectZoneHtml"=>$selectZone,"resultTables"=>$resultsTablesHtml,"region"=>$localisation,"departement"=>$departement,"typeJeu"=>$typesjeuHtml)
        );
    }
}
