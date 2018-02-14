<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14/02/2018
 * Time: 10:35
 */

namespace Application\Model\Auteur;


use Core\Model\DbTable;

class AuteurDb extends DbTable
{
    protected $_table = 'auteur';
    protected $_primary = 'IDAUTEUR';
    protected $_classToMap = Auteur::class;
}