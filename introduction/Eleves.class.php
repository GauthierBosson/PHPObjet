<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12/02/2018
 * Time: 11:31
 */

# alt + insert pour tout générer comme un flemmard
class Eleves
{
    private $Nom,
            $Prenom,
            $Age;

    public function __construct($Nom, $Prenom, $Age)
    {
        $this->Nom = $Nom;
        $this->Prenom = $Prenom;
        $this->Age = $Age;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->Age;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @param mixed $Age
     */
    public function setAge($Age)
    {
        $this->Age = $Age;
    }

    /**
     * Retourne le prénom et le nom de l'élève
     * @return string
     */
    public function getNomComplet() {
        return $this->Prenom. " " . $this->Nom;
    }
}