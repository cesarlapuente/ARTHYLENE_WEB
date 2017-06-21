<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 21/06/2017
 * Time: 10:22
 */

namespace App\Api;


use ArthyleneFramework\Application;

class ApiApplication extends Application
{
    public function __construct()
    {
        parent::__construct();
        $this->name = 'Api';
    }

    public function run()
    {
        $controller = $this->getController();
        $controller->execute();

        $this->httpResponse->setPage($controller->page());
        $this->httpResponse->send();
    }
}