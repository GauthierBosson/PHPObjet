<?php

namespace Core\Model;


class DbFactory
{
    public static function PdoFactory() {

        # Création d'une connexion PDO
        $pdo = new \PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASW);

        # Gestion des erreurs
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        # On retourne $pdo
        return $pdo;
    }

    public static function IdiormFactory() {
        #Initialisation de Idiorm

        ORM::configure('mysql:host=' . DBHOST . ';dbname=' . DBNAME);
        ORM::configure('username', DBUSER);
        ORM::configure('password', DBPASW);
        /**
         * Configuration de la clé primaire de chaque table
         * Cette configuration n'est nécessaire que si les clés
         * primaires sont différentes de 'id"
         */
        ORM::configure('id_column_overrides', array(
            'article' => 'IDARTICLE',
            'view_articles' => 'IDARTICLE',
        ));
    }
}