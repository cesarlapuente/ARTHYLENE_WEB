<?php

/**
 * Created by PhpStorm.
 * User: Thibault Nougues
 * Date: 28/05/2017
 * Time: 01:33
 */

namespace App\Frontend;

use ArthyleneFramework\Application;

class FrontendApplication extends Application
{
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Frontend';
    }

    public function run()
    {
        if ($this->user->isAuthenticated()) {
            $this->httpResponse->redirect('./admin/');
        } else {
            $controller = $this->getController();
            $controller->execute();

            $this->httpResponse->setPage($controller->page());
            $this->httpResponse->send();
        }
    }
}