<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 27/05/2017
 * Time: 18:05
 */

namespace ArthyleneFramework;


abstract class ApplicationComponent
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function app()
    {
        return $this->app;
    }
}