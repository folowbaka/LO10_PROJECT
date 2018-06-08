<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 23/05/2018
 * Time: 00:42
 */

namespace App\DataFixtures;


use App\Entity\Region;
use App\Entity\TableJeuType;
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
        $this->loadRegion($manager);
        $manager->flush();
    }

    public function loadRegion(ObjectManager $manager)
    {
        $manager->persist(new Region("Alsace"));
        $manager->persist(new Region("Aquitaine"));
        $manager->persist(new Region("Auvergne"));
        $manager->persist(new Region("Basse-Normandie"));
        $manager->persist(new Region("Bourgone"));
        $manager->persist(new Region("Bretagne"));
        $manager->persist(new Region("Centre"));
        $manager->persist(new Region("Champagne-Ardenne"));
        $manager->persist(new Region("Corse"));
        $manager->persist(new Region("Franche-Comté"));
        $manager->persist(new Region("Haute-Normandie"));
        $manager->persist(new Region("Ile-de-France"));
        $manager->persist(new Region("Languedoc-Roussillon"));
        $manager->persist(new Region("Limousin"));
        $manager->persist(new Region("Lorraine"));
        $manager->persist(new Region("Midi-Pyrénées"));
        $manager->persist(new Region("Nord-Pas-de-Calais"));
        $manager->persist(new Region("Pays de la Loire"));
        $manager->persist(new Region("Picardie"));
        $manager->persist(new Region("Poitou-Charentes"));
        $manager->persist(new Region("Provence-Alpes-Côte d'Azur"));
        $manager->persist(new Region("Rhône-Alpes"));
    }
}