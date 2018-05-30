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
            if($type==1)
                $type="Société";
            else
                $type="Role";
            $html.="<a  href=\"\" class=\"list-group-item list-group-item-action\"><div class=\"\">
                <img class=\"img-fluid\" src=\"/assets/images/slimedoogo.png\"  alt=\"Card image cap\">
                <div class=\"\">
                    <h5 class=\"card-title cardTitreJeu text-center\">$titre</h5>
                    <p class=\"card-text villeJeuFloat\">$ville</p>
                    <p class=\"card-text typeJeuFloat\">$type</p>
                </div>
               </div></a>";
        }

        return $html;
    }

}