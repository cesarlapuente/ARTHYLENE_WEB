<?php

/**
 * Created by PhpStorm.
 * User: Thibault Nougues
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
        
        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executePresentation(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Presentation')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeMaturity(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Maturite')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeState(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Etat')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeLabel(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Etiquette')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeChecklist(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Checklist')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executePicture(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Photo')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeCaracteristique(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Caracteristique')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeBeneficeSante(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('BeneficeSante')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeConseil(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Conseil')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

    public function executeMarketing(HTTPRequest $request)
    {
        $all = $this->managers->getManagerOf('Marketing')->getAll();

        if(!is_null($all))
        {
            $this->page()->addVar('json', json_encode($all));
        }
        else
        {
            $myObj = new \stdClass();
            $myObj->message = "Empty";
            $jsonArray = array($myObj);
            $this->page()->addVar('json', json_encode($jsonArray));
        }
    }

}