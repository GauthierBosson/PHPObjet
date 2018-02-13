<?php


namespace Core\Controller;


class AppController
{
    private $_viewparams;

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
        include_once PATH_VIEWS . '/' . $view . '.php';

        # Chargement du footer
        include_once PATH_FOOTER;
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
}