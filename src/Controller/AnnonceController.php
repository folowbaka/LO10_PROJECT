<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
     * @Route("/annonce/recherche/{localisation}", name="rechercheAnnonce")
     */
    public function recherche($localisation="france")
    {
        $zoneRecherche=array("near"=>"Autour de moi", "france"=>"Toute la France","alsace"=>"Alsace","aquitaine"=>"Aquitaine","basse-normandie"=>"Basse-Normandie",
            "bourgone"=>"Bourgogne","bretagne"=>"Bretagne","centre"=>"Centre", "champagne-ardenne"=>"Champagne-Ardenne","corse"=>"Corse","franche-comte"=>"Franche-Comté",
            "haute-normandie"=>"Haute-Normandie", "ile-de-france"=>"Ile-de-France","languedoc-roussillon"=>"Languedoc-Roussillon","limousin"=>"Limousin","lorraine"=>"Lorraine",
            "midi-pyrenees"=>"Midi-Pyrénées","nord-pas-de-calais"=>"Nord-Pas-de-Calais","pays de la loire"=>"Pays de la Loire","picardie"=>"Picardie","poitou-charentes"=>"Poitou-Charentes",
            "provence-alpes-cote-dazur"=>"Provence-Alpes-Côte d'Azur", "rhone-alpes"=>"Rhône-Alpes");
        $selectZone="";
        foreach ($zoneRecherche as $zone)
        {
            $selectZone.="<option>$zone</option>";
        }
        return $this->render('annonce/recherche.html.twig',array("selectZoneHtml"=>$selectZone)
        );
    }
}
