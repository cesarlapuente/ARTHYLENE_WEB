<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 30/05/2017
 * Time: 12:57
 */

namespace App\Frontend\Modules\Maturite;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class MaturiteController extends BackController
{
    public function executeShow(HTTPRequest $request)
    {
        $maturite = $this->managers->getManagerOf('Maturite')->getUnique($request->getData('id'));

        if (empty($maturite)) {
            $this->app->httpResponse()->redirect404();
        }
        $produit = $this->managers->getManagerOf('Produit')->getUniqueId($maturite->getIdProduit());

        $this->page->addVar('maturite', $maturite);
        $this->page->addVar('produit', $produit);
    }
}