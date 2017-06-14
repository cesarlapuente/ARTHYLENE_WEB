<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 27/05/2017
 * Time: 19:02
 */

namespace ArthyleneFramework;


class Managers
{
    protected $api = null;
    /** @var \PDO */
    protected $dao = null;
    protected $managers = [];

    public function __construct($api, $dao)
    {
        $this->api = $api;
        $this->dao = $dao;
    }

    public function getManagerOf($module)
    {
        if (!is_string($module) || empty($module)) {
            throw new \InvalidArgumentException('Le module spécifié est invalide');
        }

        if (!isset($this->managers[$module])) {
            $manager = '\\Model\\' . $module . 'Manager' . $this->api;

            $this->managers[$module] = new $manager($this->dao);
        }

        return $this->managers[$module];
    }
}