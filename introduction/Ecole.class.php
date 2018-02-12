<?php
/**
 * Création d'une class Ecole :
 * Une Classe PHP est une entité regroupant
 * des variables et des fonctions.
 * Chacune de ces fonctions aura accès aux
 * variables de cette entité.
 */

class Ecole
{
    # Déclaration des propriétés de notre class "Ecole"
    private $NomEcole,
            $AdresseEcole,
            $DirecteurEcole,
            $Classes = [];

    # Afin de pouvoir attribuer une valeur à
    # mes différentes variables, je vais mettre
    # en place un constructeur

    /**
     * Ecole constructor.
     * @param $NomEcole
     * @param $AdresseEcole
     * @param $DirecteurEcole
     */
    public function __construct(
        $NomEcole,
        $AdresseEcole,
        $DirecteurEcole) {

        # Ici, nous allons attribuer une valeur
        # aux propriétés de la class.
        # La valeur est passée grâce au constructeur

        $this->NomEcole = $NomEcole;
        $this->AdresseEcole = $AdresseEcole;
        $this->DirecteurEcole = $DirecteurEcole;
    }

    /* ----------------------------------- Getters */

    public function getDirecteurEcole()
    {
        return $this->DirecteurEcole;
    }

    public function getNomEcole()
    {
        return $this->NomEcole;
    }

    public function getAdresseEcole()
    {
        return $this->AdresseEcole;
    }

    /**
     * @return array
     */
    public function getClasses()
    {
        return $this->Classes;
    }

    /* ----------------------------------- Setters */

    /**
     * Affecter une nouvelle valeur à NomEcole
     * @param $NomEcole
     */
    public function setNomEcole($NomEcole)
    {
        $this->NomEcole = $NomEcole;
    }

    /**
     * @param mixed $AdresseEcole
     */
    public function setAdresseEcole($AdresseEcole)
    {
        $this->AdresseEcole = $AdresseEcole;
    }

    /**
     * @param mixed $DirecteurEcole
     */
    public function setDirecteurEcole($DirecteurEcole)
    {
        $this->DirecteurEcole = $DirecteurEcole;
    }

    public function AjouterUneClasse(Classes $Classes)
    {
        $this->Classes[] = $Classes;
    }
}