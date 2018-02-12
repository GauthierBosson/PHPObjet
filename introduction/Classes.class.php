<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/02/2018
 * Time: 11:28
 */

class Classes
{
    private $NomClasse,
            $Eleves = [];

    public function __construct($NomClasse)
    {
        $this->NomClasse = $NomClasse;
    }

    /**
     * @return mixed
     */
    public function getNomClasse()
    {
        return $this->NomClasse;
    }

    /**
     * @param mixed $NomClasse
     */
    public function setNomClasse($NomClasse)
    {
        $this->NomClasse = $NomClasse;
    }

    public function getEleves() {
        return $this->Eleves;
    }

    /**
     * @param array $Eleves
     */
    public function AjouterUnEleve(Eleves $Eleves)
    {
        $this->Eleves[] = $Eleves;
    }
}