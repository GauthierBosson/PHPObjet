<?php

namespace Application\Controller;


use Application\Model\Article\ArticleDb;
use Application\Model\Auteur\AuteurDb;
use Application\Model\Categorie\CategorieDb;
use Application\Model\Tags\TagsDb;
use Core\Controller\AppController;

class NewsController extends AppController
# Une classe ne peut hériter que d'une seule autre classe
{
    public function indexAction() {
        $this->render('news/index', [
            'titre' => 'Webforce 3 Index'

        ]);
        # include_once PATH_VIEWS . '/news/index.php';
    }
    public function categorieAction() {
        # Connexion à la BDD
        $categorieDb = new CategorieDb();
        $categories = $categorieDb->fetchAll();
        $this->render('news/categorie', [
            'categories' => $categories
        ]);
    }
    public function articleAction() {

        $articleDb = new ArticleDb();
        $articles = $articleDb->fetchAll();
        $this->render('news/article', [
            'articles' => $articles
        ]);
    }

    public function auteurAction() {

        $auteurDb = new AuteurDb();
        $auteurs = $auteurDb->fetchAll();
        $this->render('news/auteur', [
            'auteurs' => $auteurs
        ]);
    }

    public function tagsAction() {

        $tagsDb = new TagsDb();
        $tags = $tagsDb->fetchAll();
        $this->render('news/tags', [
            'tags' => $tags
        ]);
    }
}