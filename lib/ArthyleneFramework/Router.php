<?php
/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 27/05/2017
 * Time: 18:39
 */

namespace ArthyleneFramework;


class Router
{
    const NO_ROUTE = 1;
    protected $routes = [];

    public function addRoute(Route $route)
    {
        if (!in_array($route, $this->routes)) {
            $this->routes[] = $route;
        }
    }

    public function getRoute($url)
    {

        // $url = str_replace("?app=Api", "", $url);
        // $url = "arthylene".$url;
        // $url = "http://arthylene/product?app=Api";

        foreach ($this->routes as $route) {
            // Si la route correspond à l'URL
            if (($varsValues = $route->match($url)) !== false) {
                // Si elle a des variables
                if ($route->hasVars()) {
                    $varsNames = $route->varsNames();
                    $listVars = [];

                    // On crée un nouveau tableau clé/valeur
                    // (clé = nom de la variable, valeur = sa valeur)
                    foreach ($varsValues as $key => $match) {
                        // La première valeur contient entièrement la chaine capturée (voir la doc sur preg_match)
                        if ($key !== 0) {
                            $listVars[$varsNames[$key - 1]] = $match;
                        }
                    }

                    // On assigne ce tableau de variables � la route
                    $route->setVars($listVars);
                }
                return $route;
            }
        }

        throw new \RuntimeException('Aucune route ne correspond à l\'URL', self::NO_ROUTE);
    }
}