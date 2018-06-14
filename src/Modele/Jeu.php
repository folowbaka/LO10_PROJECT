<?php
/**
 * Created by IntelliJ IDEA.
 * User: david
 * Date: 11/06/2018
 * Time: 23:07
 */

namespace App\Modele;


class Jeu
{
    public static function getJeuRow($jeux)
    {
        $html="";
        foreach ($jeux as $jeu)
        {
            $titre=$jeu->getTitre();
            $idJeu=$jeu->getId();
            $html.="<a  href=\"/fiche/jeu/$idJeu\" class=\"list-group-item list-group-item-action\"><div class=\"\">
                <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <img class=\"img-fluid\" src=\"/assets/images/slimedoogo.png\"  alt=\"Card image cap\">
                    </div>
                    <div class=\"col-lg-3\">
                        <h5 class=\"card-title cardTitreJeu\">$titre</h5>
                    </div>
                </div>
               </div></a>";
        }
        return $html;
    }

}