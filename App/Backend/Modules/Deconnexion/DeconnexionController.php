<?php

/**
 * Created by PhpStorm.
 * User: Thibault Nougues
 * Date: 31/05/2017
 * Time: 14:01
 */

namespace App\Backend\Modules\Deconnexion;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class DeconnexionController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->app->getUser()->setAuthenticated(false);
        $this->app->httpResponse()->redirect('../');
    }
}