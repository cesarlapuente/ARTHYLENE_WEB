<?php

/**
 * Created by PhpStorm.
 * User: Thibault Nougues
 * Date: 19/06/2017
 * Time: 09:57
 */

namespace App\Backend\Modules\Etiquette;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Etiquette;
use Entity\Photo;

class EtiquetteController extends BackController
{

    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des etiquettes');

        $manager = $this->managers->getManagerOf('Etiquette');

        $this->page->addVar('listeEtiquette', $manager->getList());
        $this->page->addVar('nombreEtiquette', $manager->count());
    }

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout d\'une etiquette');
        $this->page->addVar('insert', 1);
    }

    public function processForm(HTTPRequest $request)
    {
        $etiquette = new Etiquette([
            'nomProduit' => ucfirst(preg_replace('#[ ]+#', '_', $request->postData('nom'))),
            'varieteProduit' => ucfirst(preg_replace('#[ ]+#', '_', $request->postData('variete'))),
            'code' => $request->postData('code'),
            'ordreEte' => intval($request->postData('ete')),
            'ordreAutomne' => intval($request->postData('automne')),
            'ordreHiver' => intval($request->postData('hiver')),
            'ordrePrintemps' => intval($request->postData('printemps')),
            'nombreDeCouche' => intval($request->postData('couche')),
            'maturiteMin' => intval($request->postData('matMin')),
            'maturiteMax' => intval($request->postData('matMax')),
            'emplacementChariot' => intval($request->postData('chariot'))
        ]);
        $photo = new Photo([
            'photo' => ''
        ]);

        $alreadyIn = $this->managers->getManagerOf('Etiquette')->alreadyIn($etiquette);

        if ($request->postExists('id')) {
            $etiquette->setIdEtiquette($request->postData('id'));
            if ($etiquette->getCode() == $request->postData('lastCode')) {
                $alreadyIn = false;
            }
        }

        if ($alreadyIn) {
            $this->app->getUser()->setFlash('<span style="color: red"><strong>Cette etiquette existe déja !</strong></span>');
        } else if ($etiquette->isValid() && !$alreadyIn) {
            $this->managers->getManagerOf('Etiquette')->save($etiquette, $photo);
            $this->app->getUser()->setFlash($etiquette->isNew() ? 'Le produit a bien été ajouté !' : 'Le produit a bien été modifié !');
            $this->app->httpResponse()->redirect('/admin/label.html');
        }
        $this->page->addVar('erreurs', $etiquette->erreurs());
        if (in_array(\Entity\Etiquette::MIN_MAX_INVALIDE, $etiquette->erreurs())) {
            $this->app->getUser()->setFlash('<span style="color: red"><strong>La maturité max doit être supérieure ou égale à la minimale !</strong></span>');
        }
        $this->page->addVar('etiquette', $etiquette);
    }

    public function executeShow(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des etiquettes');
        $etiquette = $this->managers->getManagerOf('Etiquette')->getUnique($request->getData('id'));
        $this->page->addVar('etiquette', $etiquette);

    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Etiquette')->delete($request->getData('id'));
        $this->app->getUser()->setFlash('L\'étiquette a bien été supprimée !');

        $this->app->httpResponse()->redirect('/admin/label.html');
    }

    public function executeUpdate(HTTPRequest $request)
    {

        $this->page->addVar('title', 'Mise à jour d\'une etiquette');

        if ($request->postExists('nom')) {
            $this->processForm($request);
        }
        $etiquette = $this->managers->getManagerOf('Etiquette')->getUnique($request->getData('id'));
        $this->page->addVar('etiquette', $etiquette);

    }

}