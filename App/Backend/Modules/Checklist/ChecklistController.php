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
    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('titre')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout d\'une etiquette');
        $this->page->addVar('insert', 1);
    }

    public function processForm(HTTPRequest $request)
    {
        $item = new Checklist([
            'title' => $request->postData('titre'),
            'content' => $request->postData('contenu'),
            'isImportant' => ($request->postData('important')) ? 1 : 0
        ]);
        $photo = new Photo([
            'photo' => ''
        ]);

        $alreadyIn = $this->managers->getManagerOf('Checklist')->alreadyIn($item);

        if ($request->postExists('id')) {
            $item->setId($request->postData('id'));
            if ($item->getTitle() == $request->postData('lastTitle')) {
                $alreadyIn = false;
            }
        }

        if ($alreadyIn) {
            $this->app->getUser()->setFlash('<span style="color: red"><strong>Cet item existe déja !</strong></span>');
        } else if ($item->isValid() && !$alreadyIn) {
            $this->managers->getManagerOf('Checklist')->save($item, $photo);
            $this->app->getUser()->setFlash($item->isNew() ? 'L\'item a bien été ajouté !' : 'L\'item a bien été modifié !');
            $this->app->httpResponse()->redirect('/admin/');
        }
        $this->page->addVar('erreurs', $item->erreurs());
        $this->page->addVar('item', $item);
    }
}