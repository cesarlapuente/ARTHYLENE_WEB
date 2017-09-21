<?php

/**
 * Created by PhpStorm.
 * User: Thibault Nougues
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

            if ($login == $this->app->getConfig()->get("login") && sha1($password) == $this->app->getConfig()->get("pass")) {
                $this->app->getUser()->setAuthenticated(true);
                $this->app->httpResponse()->redirect("http://" . $_SERVER['HTTP_HOST'] . "/admin");
                //$_SERVER['PHP_SELF'];

            } else {
                $this->app->getUser()->setFlash('<span style="color: red"><strong>Le pseudo ou le mot de passe est incorrect.</strong></span>');
            }
        }
    }
}