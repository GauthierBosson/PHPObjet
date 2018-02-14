<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14/02/2018
 * Time: 10:47
 */

namespace Application\Model\Tags;


use Core\Model\DbTable;

class TagsDb extends DbTable
{
    protected $_table = 'tags';
    protected $_primary = 'IDTAGS';
    protected $_classToMap = Tags::class;
}