<?php


namespace Core\Controller;


use Core\Model\DbFactory;
use Core\Model\Helper;

class AppController
{
    use Helper;

    private $_viewparams;

    /**
     * Permet d'utiliser la connexion à la BDD pour
     * l'ensemble des actions
     * AppController constructor.
     */
    public function __construct()
    {
        # Initialisation de IdiomFactory à la construction de AppController
        DbFactory::IdiormFactory();
    }

    /**
     * Permet de générer l'affichage
     * de la vue passée en paramètre
     * @param $view Vue à afficher
     * @param array $viewparam Données à passer à la vue
     */
    protected function render($view, Array $viewparams = []) {
        # Récupération et affectation des paramètres de la vue
        $this->_viewparams = $viewparams;

        # Permet d'accéder au tableau directement dans les variables
        extract($this->_viewparams);

        # Chargement du header
        include_once PATH_HEADER;

        # Chargement de la vue
        $view = PATH_VIEWS . '/' . $view . '.php';
        if(file_exists($view)) :
            # chargement du header
            include_once PATH_HEADER;
            # chargement de la vue
            include_once $view;
            # chargement du footer
            include_once PATH_FOOTER;

        else :
            $this->render('errors/404', [
                'message' => 'Aucune vue correspondante'
            ]);

        endif;

        # Chargement du footer
        include_once PATH_FOOTER;
    }

    /**
     * Effectue un rendu JSON du tableau passé en param
     * @param array $param
     */
    protected function renderJson(Array $param) {
        header('Content-Type: application/json');
        echo json_encode($param);
    }

    /**
     * Renvoi le tableau de paramètres de la vue
     * @return \ArrayObject
     */
    public function getViewparams()
    {
        $objet = new \ArrayObject($this->_viewparams);
        $objet->setFlags(\ArrayObject::ARRAY_AS_PROPS);
        return $objet;
    }

    /**
     * Permet de débuguer les paramètres de la vue
     * ou le paramètre passé
     * @param array $params
     */
    public function debug($params = '') {

        if(empty($params)) :
            $params = $this->_viewparams;
        endif;

        echo '<pre>';
            print_r($params);
        echo '</pre>';
    }

    /**
     * Vérifie l'existence de valeur dans $_GET['action']
     * @return string
     */
    public function getAction() {
        if(empty($_GET['action'])) {
            return 'accueil';
        }
        return $_GET['action'];
    }
}