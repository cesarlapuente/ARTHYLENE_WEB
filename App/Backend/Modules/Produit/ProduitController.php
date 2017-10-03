<?php
/**
 * Created by PhpStorm.
 * User: Thibault Nougues
 * Date: 31/05/2017
 * Time: 14:19
 */

namespace App\Backend\Modules\Produit;


use ArthyleneFramework\BackController;
use ArthyleneFramework\HTTPRequest;
use Entity\Photo;
use Entity\Presentation;
use Entity\Produit;

use Entity\BeneficeSante;
use Entity\Caracteristique;
use Entity\Conseil;
use Entity\Marketing;

class ProduitController extends BackController
{

    public function executeShow(HTTPRequest $request)
    {
        $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('nom'), $request->getData('variete'));

        if (empty($produit)) {
            $this->app->httpResponse()->redirect404();
        }
        $presentation = $this->managers->getManagerOf('Presentation')->getUnique($produit->getIdPresentation());

        $beneficeSante = $this->managers->getManagerOf('BeneficeSante')->getUnique($produit->getIdBeneficeSante());
        $caracteristique = $this->managers->getManagerOf('Caracteristique')->getUnique($produit->getIdCaracteristique());
        $conseil = $this->managers->getManagerOf('Conseil')->getUnique($produit->getIdConseil());
        $marketing = $this->managers->getManagerOf('Marketing')->getUnique($produit->getIdMarketing());

        $photo = $this->managers->getManagerOf('Photo')->getUnique($presentation->getIdPhoto());

        $this->page->addVar('title', preg_replace('#[_]+#', ' ', $produit->getNomProduit()));
        $this->page->addVar('produit', $produit);
        $this->page->addVar('presentation', $presentation);

        $this->page->addVar('photo', $photo);

        $this->page->addVar('beneficeSante', $beneficeSante);
        $this->page->addVar('caracteristique', $caracteristique);
        $this->page->addVar('conseil', $conseil);
        $this->page->addVar('marketing', $marketing);
    }

    public function executeIndex(HTTPRequest $request)
    {
        $this->page->addVar('title', 'Gestion des Produit');

        $manager = $this->managers->getManagerOf('Produit');

        $this->page->addVar('listeProduit', $manager->getList());
        $this->page->addVar('nombreProduit', $manager->count());
    }

    public function executeInsert(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        }
        $this->page->addVar('title', 'Ajout d\'un produit');
        $this->page->addVar('insert', 1);
    }

    public function processForm(HTTPRequest $request)
    {
        $produit = new Produit([
            'nomProduit' => ucfirst(preg_replace('#[ ]+#', '_', $request->postData('nom'))),
            'varieteProduit' => ucfirst(preg_replace('#[ ]+#', '_', $request->postData('variete')))
        ]);
        $presentation = new Presentation([
            'contenu' => $request->postData('presentation'),
            'idPhoto' => ''
        ]);
         if(!empty($_FILES['photo']))
        {
            $photo = new Photo([
                'photo' => $_FILES['photo'],
                'chemin' => $_FILES['photo']['tmp_name'], //chemin temporaire
                'name' => $_FILES['photo']['name'],
                'type' => $_FILES['photo']['type'],
                'size' => $_FILES['photo']['size']
            ]); 
        }
        else
        {
            $photo = new Photo([
                'photo' => '',
                'chemin' => '',
                'name' => '',
                'type' => '',
                'size' => ''
            ]); 
        }

        $beneficeSante = new BeneficeSante([
            'idBeneficeSante' => intval($request->postData('idBeneficeSante')),
            'idProduit' => $request->postData('idProduit'),
            'benefice1' => $request->postData('benefice1'),
            'benefice2' => $request->postData('benefice2'),
            'benefice3' => $request->postData('benefice3'),
            'benefice4' => $request->postData('benefice4'),
            'benefice5' => $request->postData('benefice5'),
            'benefice6' => $request->postData('benefice6')
        ]);

        $caracteristique = new Caracteristique([
            'idCaracteristique' => intval($request->postData('idCaracteristique')),
            'idProduit' => $request->postData('idProduit'),
            'famille' => $request->postData('famille'),
            'espece' => $request->postData('espece'),
            'origine' => $request->postData('origine'),
            'forme' => $request->postData('forme'),
            'taillePoids' => $request->postData('tailleEtPoids'),
            'couleurTexture' => $request->postData('couleurEtTexture'),
            'saveur' => $request->postData('saveur'),
            'principauxProducteurs' => $request->postData('principauxProducteur')
        ]);

        $conseil = new Conseil([
            'idConseil' => intval($request->postData('idConseil')),
            'idProduit' => $request->postData('idProduit'),
            'conseil1' =>  $request->postData('conseil1'),
            'conseil2' => $request->postData('conseil2'),
            'conseil3' => $request->postData('conseil3'),
            'conseil4' => $request->postData('conseil4'),
            'conseil5' => $request->postData('conseil5'),
            'conseil6' => $request->postData('conseil6')
        ]);

        $marketing = new Marketing([
            'idMarketing' => intval($request->postData('idMarketing')),
            'idProduit' => $request->postData('idProduit'),
            'marketing1' => $request->postData('marketing1'),
            'marketing2' => $request->postData('marketing2')
        ]);

        if ($request->postExists('modif')) {
            $produit->setModif($request->postData('modif'));
            $produit->setIdProduit(1);
            $produit->setIdPresentation(intval($request->postData('idPres'), 10));
            $presentation->setIdPresentation(intval($request->postData('idPres')));
            $presentation->setIdPhoto(intval($request->postData('idPhoto')));
        }

        if ($request->postExists('modif')
            && $produit->getNomProduit() == $request->postData('modifName')
            && $produit->getVarieteProduit() == $request->postData('modif')
        ) {
            $alreadyIn = false;
        } else {
            $alreadyIn = $this->managers->getManagerOf('Produit')->alreadyIn($produit);
        }

        if ($alreadyIn) {
            $this->app->getUser()->setFlash('<span style="color: red"><strong>Ce produit existe déja !</strong></span>');
            $produit->setNomProduit($request->getData('nom'));
            $produit->setVarieteProduit($request->getData('variete'));
        } else if ($produit->isValid() && !$alreadyIn && $presentation->isValid()) {
            $this->managers->getManagerOf('Produit')->save($produit, $presentation, $photo, $beneficeSante, $caracteristique, $conseil, $marketing);

            $this->app->getUser()->setFlash($produit->isNew() ? 'Le produit a bien été ajouté !' : 'Le produit a bien été modifié !');
            $this->app->httpResponse()->redirect('/admin/produit.html');
        } else {
            $this->page->addVar('erreurs', $produit->erreurs());
            $this->page->addVar('erreursPresentation', $presentation->erreurs());
        }

        $this->page->addVar('produit', $produit);
        $this->page->addVar('presentation', $presentation);

        $this->page->addVar('photo', $photo);

        $this->page->addVar('beneficeSante', $beneficeSante);
        $this->page->addVar('caracteristique', $caracteristique);
        $this->page->addVar('conseil', $conseil);
        $this->page->addVar('marketing', $marketing);
    }

    public function executeUpdate(HTTPRequest $request)
    {
        if ($request->postExists('nom')) {
            $this->processForm($request);
        } else {
            $produit = $this->managers->getManagerOf('Produit')->getUnique($request->getData('nom'), $request->getData('variete'));
            $produit->setIdProduit(1);
            $presentation = $this->managers->getManagerOf('Presentation')->getUnique($produit->getIdPresentation());

            $photo = $this->managers->getManagerOf('Photo')->getUnique($presentation->getIdPhoto());

            $beneficeSante = $this->managers->getManagerOf('BeneficeSante')->getUnique($produit->getIdBeneficeSante());
            $caracteristique = $this->managers->getManagerOf('Caracteristique')->getUnique($produit->getIdCaracteristique());
            $conseil = $this->managers->getManagerOf('Conseil')->getUnique($produit->getIdConseil());
            $marketing = $this->managers->getManagerOf('Marketing')->getUnique($produit->getIdMarketing());

            $this->page->addVar('produit', $produit);
            $this->page->addVar('presentation', $presentation);

            $this->page->addVar('photo', $photo);

            $this->page->addVar('beneficeSante', $beneficeSante);
            $this->page->addVar('caracteristique', $caracteristique);
            $this->page->addVar('conseil', $conseil);
            $this->page->addVar('marketing', $marketing);
        }

        $this->page->addVar('title', 'Modification d\'un produit');
    }

    public function executeDelete(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Produit')->delete($request->getData('nom'), $request->getData('variete'));
        $this->app->getUser()->setFlash('La produit a bien été supprimée !');

        $this->app->httpResponse()->redirect('/admin/produit.html');
    }
}