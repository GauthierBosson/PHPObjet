<?php

namespace Application\Controller;


use Application\Model\Article\ArticleDb;
use Application\Model\Auteur\AuteurDb;
use Application\Model\Categorie\CategorieDb;
use Application\Model\Tags\TagsDb;
use Core\Controller\AppController;
use Core\Model\DbFactory;
use Core\Model\ORM;

class NewsController extends AppController
# Une classe ne peut hériter que d'une seule autre classe
{
    public function indexAction() {

        # Connexion à la base de données
        $articleDB = new ArticleDb;

        # Récupération des articles
        $articles = $articleDB->fetchAll();

        # Récupération des articles en spotlight
        $spotlight = $articleDB->fetchAll('SPOTLIGHTARTICLE = 1');

        $this->render('news/index', [
            'articles' => $articles,
            'spotlight' => $spotlight

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

    public function idiormAction() {
        # Récupération des catégories
        DbFactory::IdiormFactory();
        $categories = ORM::for_table('categorie')
            ->find_result_set();
            //->find_array(); Affichage json : renderJson

        //$this->debug($categories);
        //$this->renderJson($categories);

        foreach ($categories as $categorie) :
            echo $categorie->LIBELLECATEGORIE . '<br>';
        endforeach;

        # Afficher la liste des auteurs du site dans un tableau html
        $auteurs = ORM::for_table('auteur')
            ->find_result_set();

        echo '<hr><table border="1">';
            foreach ($auteurs as $auteur) :
                echo '<tr>';
                    echo '<td>' . $auteur->IDAUTEUR . '</td>';
                    echo '<td>' . $auteur->PRENOMAUTEUR . '</td>';
                    echo '<td>' . $auteur->NOMAUTEUR . '</td>';
                    echo '<td>' . $auteur->EMAILAUTEUR . '</td>';
                echo '</tr>';
            endforeach;
        echo '</table>';
    }

    //URL ARTICLE : http://localhost/FORMATION/WF3-ROUEN/POO/TECHNEWS/public/article/1-slug-de-mon-article.html
    //[http://localhost/FORMATION/WF3-ROUEN/POO/TECHNEWS/public/] a remplacer par votre route...

    //>>>>>>>>>> article/1-slug-de-mon-article.html
    public function articleAction()
    {
        # http://localhost/technews/article/18-leslug.html
        DbFactory::IdiormFactory();
        # Récupération de l'IDARTICLE
        $idarticle = $_GET['idarticle'];

        # Récupération de l'Article
        $article = ORM::for_table('view_articles')
            ->find_one($idarticle);

        # Récupération des Articles de la Catégorie (suggestions)
        $suggestions = ORM::for_table('view_articles')
            # Je récupère uniquement, les articles de la même
            # catégorie que mon article
            ->where('IDCATEGORIE', $article->IDCATEGORIE)
            # Sauf mon article en cours
            ->where_not_equal('IDARTICLE', $idarticle)
            # 3 articles maximum
            ->limit(3)
            # Par ordre décroissant
            ->order_by_desc('IDARTICLE')
            # Je récupère les résultats
            ->find_result_set();

        # Transmission à la Vue.
        $this->render('news/article', [
            'article' => $article,
            'suggestions' => $suggestions
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

    public function businessAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 2');
        $this->render('news/categorie',['articles'=>$article]);
    }
    public function computingAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 3');
        $this->render('news/categorie',['articles'=>$article]);
    }
    public function techAction(){
        $articleDb= new ArticleDb();
        $article = $articleDb->fetchAll('IDCATEGORIE = 4');
        $this->render('news/categorie',['articles'=>$article]);
    }
}