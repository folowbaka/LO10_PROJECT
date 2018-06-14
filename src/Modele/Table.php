<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 30/05/2018
 * Time: 00:10
 */

namespace App\Modele;


use App\Entity\TableJeu;

class Table
{
    public static function getTableCard($tables)
    {
        $html="";
        foreach ($tables as $table)
        {
            $titre=$table->getTitre();
            $ville=$table->getVille();
            $type=$table->getType()->getId();
            $idJeu=$table->getId();
            $type=$table->getType()->getNom();
            $html.="<a  href=\"/fiche/table/$idJeu\" class=\"list-group-item list-group-item-action\"><div class=\"\">
                <img class=\"img-fluid\" src=\"/assets/images/slimedoogo.png\"  alt=\"Card image cap\">
                <div class=\"\">
                    <h5 class=\"card-title cardTitreJeu text-center\">$titre</h5>
                    <p class=\"card-text typeJeuFloat\">$type</p>
                    <p class=\"card-text villeJeuFloat\">$ville</p>
                </div>
               </div></a>";
        }

        return $html;
    }
    public static function getTableRow($tables)
    {
        $html="";
        foreach ($tables as $table)
        {
            $titre=$table->getTitre();
            $ville=$table->getVille();
            $type=$table->getType()->getId();
            $idJeu=$table->getId();
            $type=$table->getType()->getNom();
            $html.="<a  href=\"/fiche/table/$idJeu\" class=\"list-group-item list-group-item-action\"><div class=\"\">
                <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <img class=\"img-fluid\" src=\"/assets/images/slimedoogo.png\"  alt=\"Card image cap\">
                    </div>
                    <div class=\"col-lg-3\">
                        <h5 class=\"card-title cardTitreJeu\">$titre</h5>
                        <p class=\"card-text\">$type</p>
                        <p class=\"card-text\">$ville</p>
                    </div>
                </div>
               </div></a>";
        }

        return $html;
    }

}