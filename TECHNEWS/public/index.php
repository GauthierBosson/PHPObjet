<?php
/**
 * Nous sommes ici sur le point d'entrée de notre Application
 * En MVC, c'est ce que l'on appelle un front controller
 * L'ensemble des actions ou requêtes de notre site internet
 * passera uniquement par ce fichier. Il a pour mission
 * de transférer au bon controleur la demande de l'utilisateur.
 * -----
 * Dans un framework et en MVC, nous utilisons la puissance de
 * la réécriture des URLs via la création d'un fichier .htaccess
 */

use Core\Core;


# Initialisation du site
require_once 'bootstrap.php';

# Front controller
$core = new Core($_GET);
