<?php

class Autoloader {
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class) {
        echo 'Autoload pour : ';
            print_r($class);
        echo '<br>';
        require PATH_ROOT . '/' . $class . '.php';
    }
}


/**
 * Fonction static : Appelle la fonction sans instancier la classe, pas besoin de mettre new
   La fonction static appartient à la classe et non à l'objet
   Les fonctions static ne peuvent appeler que des fonctions static
 * Une fonction non static peut appeler une fonction static en utilisant le mot self
 */