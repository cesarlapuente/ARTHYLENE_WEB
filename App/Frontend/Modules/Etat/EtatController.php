<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 12:57
 */

namespace App\Frontend\Modules\Etat;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class EtatController extends BackController
{
    public function executeShow(HTTPRequest $request)
    {
        $etat = $this->managers->getManagerOf('Etat')->getUnique($request->getData('id'));
        if (empty($etat)) {
            $this->app->httpResponse()->redirect404();
        }
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($etat->getIdProduit());

        $this->page->addVar('etat', $etat);
        $this->page->addVar('produit', $produit);
    }
}