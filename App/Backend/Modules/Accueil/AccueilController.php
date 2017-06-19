<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 19/06/2017
 * Time: 12:17
 */

namespace App\Backend\Modules\Accueil;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class AccueilController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        // On ajoute une définition pour le titre.
        $this->page->addVar('title', 'Accueil');
    }

}