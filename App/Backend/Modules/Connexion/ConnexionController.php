<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 31/05/2017
 * Time: 14:01
 */

namespace App\Backend\Modules\Connexion;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class ConnexionController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Connexion');

        if ($request->postExists('login')) {
            $login = $request->postData('login');
            $password = $request->postData('password');

            if ($login == $this->app->getConfig()->get("login") && $password == $this->app->getConfig()->get("pass")) {
                $this->app->getUser()->setAuthenticated(true);
                $this->app->httpResponse()->redirect('.');
            } else {
                $this->app->getUser()->setFlash('Le pseudo ou le mot de passe est incorrect.');
            }
        }
    }
}