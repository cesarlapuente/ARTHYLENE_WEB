<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 31/05/2017
 * Time: 12:34
 */

namespace App\Backend;

use ArthyleneFramework\Application;

class BackendApplication extends Application
{

    public function __construct()
    {
        parent::__construct();
        $this->name = 'Backend';
    }

    public function run()
    {
        if ($this->user->isAuthenticated()) {
            $controller = $this->getController();
        } else {
            $controller = new Modules\Connexion\ConnexionController($this, 'Connexion', 'index');
        }
        $controller->execute();

        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
}