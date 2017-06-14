<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 28/05/2017
 * Time: 01:28
 */

namespace ArthyleneFramework;


abstract class Manager
{
    /** @var \PDO */
    protected $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }
}