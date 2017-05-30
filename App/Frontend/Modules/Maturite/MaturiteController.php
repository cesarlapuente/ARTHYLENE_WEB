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
        //$maturite = $this->managers->getManagerOf('Maturite')->getUnique($request->getData('id'));

        /*if (empty($produit))
        {
            $this->app->httpResponse()->redirect404();
        }*/
        //$this->page->addVar('produit', $maturite);
        $this->page->addVar('produit', $request->getData('produit'));
        $this->page->addVar('variete', $request->getData('variete'));
        $this->page->addVar('niveau', $request->getData('niveau'));
    }
}