<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 23/05/2018
 * Time: 00:42
 */

namespace App\DataFixtures;


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

        $manager->flush();
    }
}