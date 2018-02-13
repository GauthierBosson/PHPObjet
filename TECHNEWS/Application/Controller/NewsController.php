<?php

namespace Application\Controller;


use Application\Model\Categorie\CategorieDb;
use Core\Controller\AppController;

class NewsController extends AppController
# Une classe ne peut hériter que d'une seule autre classe
{
    public function indexAction() {

        # Connexion à la BDD
        $categorieDb = new CategorieDb();
        $categories = $categorieDb->fetchAll();

        $this->render('news/index', [
            'categories' => $categories
        ]);
        # include_once PATH_VIEWS . '/news/index.php';
    }
    public function categorieAction() {
        $this->render('news/categorie', [
            'titre' => 'Webforce 3 Rouen categorie'
        ]);
    }
    public function articleAction() {
        $this->render('news/article', [
            'titre' => 'Webforce 3 Rouen article'
        ]);
    }
}