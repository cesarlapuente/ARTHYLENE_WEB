<?php

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 21/06/2017
 * Time: 10:29
 */

namespace App\Api\Modules\Post;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;

class PostController extends BackController
{
    public function executeProduct(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Produit')->getAll();
        $this->page()->addVar('json', json_encode($all));
    }

    public function executePresentation(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Presentation')->getAll();
        $this->page()->addVar('json', json_encode($all));
    }

    public function executeMaturity(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Maturite')->getAll();
        $this->page()->addVar('json', json_encode($all));
    }

    public function executeState(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Etat')->getAll();
        $this->page()->addVar('json', json_encode($all));
    }

    public function executeLabel(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Etiquette')->getAll();
        $this->page()->addVar('json', json_encode($all));
    }

    public function executeChecklist(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Checklist')->getAll();
        $this->page()->addVar('json', json_encode($all));
    }

}