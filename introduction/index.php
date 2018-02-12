<?php

# Importation de notre Classe Ecole, Classes et Eleves
require_once 'Ecole.class.php';
require_once 'Classes.class.php';
require_once 'Eleves.class.php';

/**
 * Création d'une instance de la classe Ecole.
 * Ici, notre variable $Ecole est un objet de
 * la classe Ecole. En ce sens, elle a accès à
 * l'ensemble des variables et fonctions qui la
 * compose.
 */

$Ecole = new Ecole('WF3 Rouen', 'Place Saint-Marc', 'Alexandre MARTINI');

# Affichage de l'objet Ecole
var_dump($Ecole);

# Afficher le nom de l'école
# : cannot access private property
# echo $Ecole->NomEcole;
echo '<br>'.$Ecole->getNomEcole();

# Je veux changer le nom de l'école ?
$Ecole->setNomEcole('Webforce3 Rouen ltd');
echo '<br>'.$Ecole->getNomEcole();

# Création d'élèves
$Eleve1 = new Eleves('JOURAND', 'Benjamin', 26);
$Eleve2 = new Eleves('BACON', 'Terry', 24);
$Eleve3 = new Eleves('BOUKHATEB', 'Abdel', 21);
$Eleve4 = new Eleves('FOLLIN', 'Emilie', 48);

# Création des classes
$Classe1 = new Classes('Front');
$Classe2 = new Classes('Back');
$Classe3 = new Classes('FullStack');

# On affecte nos élèves à leur classe
$Classe1->AjouterUnEleve($Eleve1);
$Classe1->AjouterUnEleve($Eleve2);
$Classe2->AjouterUnEleve($Eleve3);
$Classe3->AjouterUnEleve($Eleve4);

# Aperçu d'une des classes
echo '<pre>';
    print_r($Classe1);
echo '</pre>';

# Affecter les classes à une école
$Ecole->AjouterUneClasse($Classe1);
$Ecole->AjouterUneClasse($Classe2);
$Ecole->AjouterUneClasse($Classe3);

# Aperçu d l'école
echo '<pre>';
    print_r($Ecole);
echo '</pre>';

# Afficher mes classes et leurs Eleves
echo '<ol>';

    # Parcourir les classes
    /**
     * Je récupère toutes les classes
     * de mon école
     */
    $lesClasses = $Ecole->getClasses();
    foreach($lesClasses as $objClasse) {
        echo '<li>';
            echo $objClasse->getNomClasse();
            echo '<ul>';

                # On récupère les étudiants de la classe
                $lesEtudiants = $objClasse->getEleves();
                foreach ($lesEtudiants as $objEtudiants) {
                    echo '<br>'.$objEtudiants->getNomComplet();
                }

            echo '</ul>';
        echo '</li>';
    }

echo '</ol>';
    echo '<br>';
    echo '<br>';
    echo '<br>';