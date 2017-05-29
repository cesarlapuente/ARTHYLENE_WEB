<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 29/05/2017
 * Time: 10:12
 */

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class ProduitController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $nombreNews = $this->app->config()->get('nombre_news');
        $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

        // On ajoute une définition pour le titre.
        $this->page->addVar('title', 'Liste des Produit');

        $manager = $this->managers->getManagerOf('Produit');

        // Cette ligne, vous ne pouviez pas la deviner sachant qu'on n'a pas encore touché au modèle.
        // Contentez-vous donc d'écrire cette instruction, nous implémenterons la méthode ensuite.
        $listeProduits = $manager->getList();

        /*foreach ($listeProduits as $produit)
        {
            $debut = substr($produit->getNomProduit()." ".$produit->getVarieteProduit(), 0 , 200);
        }*/
        // On ajoute la variable $listeNews à la vue.
        $this->page->addVar('listeNews', $listeProduits);
    }
}