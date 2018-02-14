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

    public function fetchAll(
        $where = '',
        $orderby = '',
        $limit = '',
        $offset = ''
    ) {
        $sql = "SELECT * FROM " . $this->_table;

        # Si $where n'est pas vide, alors je l'inclus dans ma requête
        /*if($where != '') :
            $sql .= ' WHERE ' . $where;
        endif;*/
        !empty($where) ? $sql .= ' WHERE ' . $where : null;
        !empty($orderby) ? $sql .= ' ORDER BY ' . $orderby : null;
        !empty($limit) ? $sql .= ' LIMIT ' . $limit : null;
        !empty($offset) ? $sql .= ' OFFSET ' . $offset : null;




        $sth = $this->_db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(
            \PDO::FETCH_CLASS,
            $this->_classToMap
        );
    }

    public function fetchOne($search, $column = '') {
        empty($column) ? $column = $this->_primary : null;

        $sth = $this->_db->prepare('SELECT * FROM ' . $this->_table . ' WHERE ' . $column . ' = :search');

        $sth->bindValue(':search', $search, \PDO::PARAM_STR);

        $sth->execute();
        $sth->setFetchMode(\PDO::FETCH_CLASS,
            $this->_classToMap);

        return $sth->fetch();
    }
}