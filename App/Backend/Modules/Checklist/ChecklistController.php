<?php

namespace App\Backend\Modules\Checklist;

use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Checklist;
use Entity\Photo;

/**
 * Created by PhpStorm.
 * User: Thibault
 * Date: 05/07/2017
 * Time: 16:41
 */
class ChecklistController extends BackController
{
    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des etiquettes');

        $manager = $this->managers->getManagerOf('Checklist');

        $this->page->addVar('checklist', $manager->getList());
        $this->page->addVar('nombreItem', $manager->count());
    }

    public function executeShow(HTTPRequest $request)
    {
        $item = $this->managers->getManagerOf('Checklist')->getUnique($request->getData('id'));
        $photo = $this->managers->getManagerOf('Photo')->getUnique($item->getIdPhoto());
        $this->page->addVar('item', $item);
        $this->page->addVar('photo', $photo);

    }

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('titre')) {
            $this->processForm($request);
        }
    }

    public function processForm(HTTPRequest $request)
    {
        $item = new Checklist([
            'titre' => $request->postData('titre'),
            'contenu' => $request->postData('contenu'),
            'isImportant' => ($request->postData('important')) ? 1 : 0
        ]);

        $extUp = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
        $name = '/Picture/' . uniqid(rand(), true) . '.' . $extUp;
        $dir = dirname(getcwd()) . "/Web" . $name;
        $photo = new Photo([
            'photo' => $name,
            'chemin' => $dir
        ]);
        if (empty($_FILES['photo'])) {
            $photo->setErreur(Photo::PICTURE_EMPTY);
        }
        if ($_FILES['photo']['error'] > 0) {
            $photo->setErreur(Photo::INVALIDE);
        }

        if (in_array($extUp, Photo::EXTENSIONS)) {
            $photo->setErreur(Photo::FORMAT);
        }

        if (empty($photo->erreurs())) {
            $res = move_uploaded_file($_FILES['photo']['tmp_name'], $dir);
            if (!$res) {
                $photo->setErreur(Photo::INVALIDE);
            }
        }

        if ($request->postExists('idPhoto')) {
            $item->setIdPhoto($request->postData('idPhoto'));

        }

        $alreadyIn = $this->managers->getManagerOf('Checklist')->alreadyIn($item);

        if ($request->postExists('id')) {
            $item->setId($request->postData('id'));
            if ($item->getTitre() == $request->postData('lastTitle')) {
                $alreadyIn = false;
            }
        }

        if ($alreadyIn) {
            $this->app->getUser()->setFlash('<span style="color: red"><strong>Cet item existe déja !</strong></span>');
        } else if ($item->isValid() && !$alreadyIn && $photo->isValid()) {
            $this->managers->getManagerOf('Checklist')->save($item, $photo);
            $this->app->getUser()->setFlash($item->isNew() ? 'L\'item a bien été ajouté !' : 'L\'item a bien été modifié !');
            $this->app->httpResponse()->redirect('/admin/checklist.html');
        }
        $this->page->addVar('erreurs', $item->erreurs());
        $this->page->addVar('item', $item);
    }

    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('titre')) {
            $this->processForm($request);
        }
        $item = $this->managers->getManagerOf('Checklist')->getUnique($request->getData('id'));
        $photo = $this->managers->getManagerOf('Photo')->getUnique($item->getIdPhoto());
        $this->page->addVar('item', $item);
        $this->page->addVar('photo', $photo);
    }

    public function executeDelete(HTTPRequest $request)
    {
        $item = $this->managers->getManagerOf('Checklist')->getUnique($request->getData('id'));
        $photo = $this->managers->getManagerOf('Photo')->getUnique($item->getIdPhoto());
        $this->managers->getManagerOf('Checklist')->delete($request->getData('id'));
        $this->managers->getManagerOf('Photo')->delete($photo->getIdPhoto());
        unlink($photo->getChemin());

        $this->app->getUser()->setFlash('L\'item a bien été supprimée !');

        $this->app->httpResponse()->redirect('/admin/checklist.html');
    }
}