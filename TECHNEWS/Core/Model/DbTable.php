<?php

namespace Core\Model;


abstract class DbTable
# Une classe abstraite ne peut pas être instanciée directement, il faut qu'elle soit héritée
# Toutes ses propriétés et méthodes n'ont pas été définies
{
    # Nom de la table
    protected $_table;

    # Clé primaire
    protected $_primary;

    # Classe à Mapper
    protected $_classToMap;

    # Instance PDO, Objet PDO, BDD
    private $_db;

    public function __construct()
    {
        # Je récupère l'instance de PDO
        $this->_db = DbFactory::PdoFactory();
    }

    public function fetchAll() {
        $sql = "SELECT * FROM " . $this->_table;
        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(
            \PDO::FETCH_CLASS,
            $this->_classToMap
        );
    }
}