<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 27/05/2017
 * Time: 19:03
 */

namespace ArthyleneFramework;


class PDOFactory
{
    public static function getMysqlConnexion()
    {
        // $db = new \PDO('mysql:host=localhost;dbname=arthylene', 'root', '', array(1002 => 'SET NAMES utf8'));
        $db = new \PDO('mysql:host=localhost;dbname=arthylene', 'arthylene_admin', 'Ijt08i6!', array(1002 => 'SET NAMES utf8'));
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}