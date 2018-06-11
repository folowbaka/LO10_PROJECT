<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 23/05/2018
 * Time: 00:42
 */

namespace App\DataFixtures;


use App\Entity\Departement;
use App\Entity\Region;
use App\Entity\TableJeuType;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $tableType1=new TableJeuType();
        $tableType1->setNom("Jeu de société");
        $manager->persist($tableType1);
        $tableType2=new TableJeuType();
        $tableType2->setNom("Jeu de role");
        $manager->persist($tableType2);
        $this->loadRegionDepartement($manager);
        $manager->flush();
    }

    public function loadRegionDepartement(ObjectManager $manager)
    {
        //Alsace
        $region=new Region("alsace","Alsace");
        $manager->persist($region);
        $manager->persist(new Departement("Bas-Rhin",$region,"67"));
        $manager->persist(new Departement("Haut-Rhin",$region,"68"));
        //Aquitaine
        $region=new Region("aquitaine","Aquitaine");
        $manager->persist($region);
        $manager->persist(new Departement("Dordogne",$region,"24"));
        $manager->persist(new Departement("Gironde",$region,"33"));
        $manager->persist(new Departement("Landes",$region,"40"));
        $manager->persist(new Departement("Lot-et-Garonne",$region,"47"));
        $manager->persist(new Departement("Pyrénées-Atlantiques",$region,"64"));
        //Auvergne
        $region=new Region("auvergne","Auvergne");
        $manager->persist($region);
        $manager->persist(new Departement("Allier",$region,"3"));
        $manager->persist(new Departement("Cantal",$region,"15"));
        $manager->persist(new Departement("Haute-Loire",$region,"43"));
        $manager->persist(new Departement("Puy-de-Dôme",$region,"63"));
        //Basse-Normandie
        $region=new Region("basse-normandie","Basse-Normandie");
        $manager->persist($region);
        $manager->persist(new Departement("Calavados",$region,"14"));
        $manager->persist(new Departement("Manche",$region,"50"));
        $manager->persist(new Departement("Orne",$region,"61"));
        //Bourgogne
        $region=new Region("bourgogne","Bourgogne");
        $manager->persist($region);
        $manager->persist(new Departement("Côte-d'Or",$region,"21"));
        $manager->persist(new Departement("Nièvre",$region,"58"));
        $manager->persist(new Departement("Saône-et-Loire",$region,"71"));
        $manager->persist(new Departement("Yonne",$region,"89"));
        //Bretagne
        $region=new Region("bretagne","Bretagne");
        $manager->persist($region);
        $manager->persist(new Departement("Côtes-d'Armor",$region,"22"));
        $manager->persist(new Departement("Finistère",$region,"29"));
        $manager->persist(new Departement("Ille-et-Vilaine",$region,"35"));
        $manager->persist(new Departement("Morbihan",$region,"56"));
        //Centre
        $region=new Region("centre","Centre");
        $manager->persist($region);
        $manager->persist(new Departement("Cher",$region,"18"));
        $manager->persist(new Departement("Eure-et-Loir",$region,"28"));
        $manager->persist(new Departement("Indre",$region,"36"));
        $manager->persist(new Departement("Indre-et-Loire",$region,"37"));
        $manager->persist(new Departement("Loir-et-Cher",$region,"41"));
        $manager->persist(new Departement("Loiret",$region,"45"));
        //Champagne-Ardenne
        $region=new Region("champagne-ardenne","Champagne-Ardenne");
        $manager->persist($region);
        $manager->persist(new Departement("Ardennes",$region,"08"));
        $manager->persist(new Departement("Aube",$region,"10"));
        $manager->persist(new Departement("Marne",$region,"51"));
        $manager->persist(new Departement("Haute-Marne",$region,"52"));
        //Corse
        $region=new Region("corse","Corse");
        $manager->persist($region);
        $manager->persist(new Departement("Corse-du-Sud",$region,"2A"));
        $manager->persist(new Departement("Haute-Corse",$region,"2B"));
        //Franche-Comté
        $region=new Region("franche-comte","Franche-Comté");
        $manager->persist($region);
        $manager->persist(new Departement("Doubs",$region,"25"));
        $manager->persist(new Departement("Jura",$region,"39"));
        $manager->persist(new Departement("Haute-Saône",$region,"70"));
        $manager->persist(new Departement("Territoire de Belfort",$region,"90"));
        //Haute-Normandie
        $region=new Region("haute-normandie","Haute-Normandie");
        $manager->persist($region);
        $manager->persist(new Departement("Eure",$region,"27"));
        $manager->persist(new Departement("Seine-Maritime",$region,"76"));
        //Île-de-France
        $region=new Region("ile-de-france","Île-de-France");
        $manager->persist($region);
        $manager->persist(new Departement("Paris",$region,"75"));
        $manager->persist(new Departement("Seine-et-Marne",$region,"77"));
        $manager->persist(new Departement("Yvelines",$region,"78"));
        $manager->persist(new Departement("Essonne",$region,"91"));
        $manager->persist(new Departement("Hauts-de-Seine",$region,"92"));
        $manager->persist(new Departement("Seine-Saint-Denis",$region,"93"));
        $manager->persist(new Departement("Val-de-Marne",$region,"94"));
        $manager->persist(new Departement("Val-d'Oise",$region,"95"));
        //Languedoc-Roussilon
        $region=new Region("languedoc-roussillon","Languedoc-Roussillon");
        $manager->persist($region);
        $manager->persist(new Departement("Aude",$region,"11"));
        $manager->persist(new Departement("Gard",$region,"30"));
        $manager->persist(new Departement("Hérault",$region,"34"));
        $manager->persist(new Departement("Lozère",$region,"48"));
        $manager->persist(new Departement("Pyrénées-Orientales",$region,"66"));
        //Limousin
        $region=new Region("limousin","Limousin");
        $manager->persist($region);
        $manager->persist(new Departement("Corrèze",$region,"19"));
        $manager->persist(new Departement("Creuse",$region,"23"));
        $manager->persist(new Departement("Haute-Vienne",$region,"87"));
        //Lorraine
        $region=new Region("lorraine","Lorraine");
        $manager->persist($region);
        $manager->persist(new Departement("Meurthe-et-Moselle",$region,"54"));
        $manager->persist(new Departement("Meuse",$region,"55"));
        $manager->persist(new Departement("Moselle",$region,"57"));
        $manager->persist(new Departement("Vosges",$region,"88"));
        //Midi-Pyrénées
        $region=new Region("midi-pyrenees","Midi-Pyrénées");
        $manager->persist($region);
        $manager->persist(new Departement("Ariège",$region,"09"));
        $manager->persist(new Departement("Aveyron",$region,"12"));
        $manager->persist(new Departement("Haute-Garonne",$region,"31"));
        $manager->persist(new Departement("Gers",$region,"32"));
        $manager->persist(new Departement("Lot",$region,"46"));
        $manager->persist(new Departement("Hautes-Pyrénées",$region,"65"));
        $manager->persist(new Departement("Tarn",$region,"81"));
        $manager->persist(new Departement("Tarn-et-Garonne",$region,"82"));
        //Nord-Pas-de-Calais
        $region=new Region("nord-pas-de-calais","Nord-Pas-de-Calais");
        $manager->persist($region);
        $manager->persist(new Departement("Nord",$region,"59"));
        $manager->persist(new Departement("Pas-de-Calais",$region,"62"));
        //Pays de la Loire
        $region=new Region("pays-de-la-loire","Pays de la Loire");
        $manager->persist($region);
        $manager->persist(new Departement("Loire-Atlantique",$region,"44"));
        $manager->persist(new Departement("Maine-et-Loire",$region,"49"));
        $manager->persist(new Departement("Mayenne",$region,"53"));
        $manager->persist(new Departement("Sarthe",$region,"72"));
        $manager->persist(new Departement("Vendée",$region,"85"));
        //Picardie
        $region=new Region("picardie","Picardie");
        $manager->persist($region);
        $manager->persist(new Departement("Aisne",$region,"02"));
        $manager->persist(new Departement("Oise",$region,"60"));
        $manager->persist(new Departement("Somme",$region,"80"));
        //Poitou-Charentes
        $region=new Region("poitou-charentes","Poitou-Charentes");
        $manager->persist($region);
        $manager->persist(new Departement("Charente",$region,"16"));
        $manager->persist(new Departement("Charente-Maritime",$region,"17"));
        $manager->persist(new Departement("Deux-Sèvres",$region,"79"));
        $manager->persist(new Departement("Vienne",$region,"86"));
        //Provence-Alpes-Côte d'Azur
        $region=new Region("provence-alpes-cote-dazur","Provence-Alpes-Côte d'Azur");
        $manager->persist($region);
        $manager->persist(new Departement("Alpes-de-Haute-Provence",$region,"04"));
        $manager->persist(new Departement("Hautes-Alpes",$region,"05"));
        $manager->persist(new Departement("Alpes-Maritimes",$region,"06"));
        $manager->persist(new Departement("Bouches-du-Rhône",$region,"13"));
        $manager->persist(new Departement("Var",$region,"83"));
        $manager->persist(new Departement("Vaucluse",$region,"84"));
        //Rhône-Alpes
        $region=new Region("rhone-alpes","Rhône-Alpes");
        $manager->persist($region);
        $manager->persist(new Departement("Ain",$region,"01"));
        $manager->persist(new Departement("Ardèche",$region,"07"));
        $manager->persist(new Departement("Drôme",$region,"26"));
        $manager->persist(new Departement("Isère",$region,"38"));
        $manager->persist(new Departement("Loire",$region,"42"));
        $manager->persist(new Departement("Rhône",$region,"69"));
        $manager->persist(new Departement("Savoie",$region,"73"));
        $manager->persist(new Departement("Haute-Savoie",$region,"74"));
        $region=new Region("near","Autour de moi");
        $manager->persist($region);
        $region=new Region("france","Toute la France");
        $manager->persist($region);
        //Utilisateur test
        $utilisateur=new Utilisateur("test@email.com","testeurPasPro");
        $manager->persist($utilisateur);

    }
}