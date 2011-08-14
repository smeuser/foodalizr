<?php

namespace Foodalizr\Mapper;

use Knid\Mapper;
use Foodalizr\Model;

class PersonMapper extends Mapper
{
    /**
     * @return string
     */
    protected function getTableName()
    {
        return 'person';
    }
    
    public function find($id)
    {
        'SELECT * FROM `' . $this->getTableName() . '` WHERE `id` = ' . (int) $id;
    }
    
    /**
     * Persists the given person to the database
     * 
     * @param \Foodalizr\Model\Person $person
     * @return \Foodalizr\Model\Person
     */
    public function save(Model\Person $person)
    {
        if (null === $person->getId()) {
            $sql = 'INSERT INTO `' . $this->getTableName() . '` (`name`) VALUES (\''
                . $this->getDb()->real_escape_string($person->getName()) . '\');';
        }
        else {
            $sql = 'UPDATE `' . $this->getTableName() . '` SET `name` = '
                . $this->getDb()->real_escape_string($person->getName()) . '\''
                . 'WHERE `id` = ' . (int) $person->getId() . ';';
        }
        
        if (false === $this->getDb()->query($sql)) {
            throw new Mapper\Exception($this->getDb()->error, $this->getDb()->errno);
        }
        
        if (null == $person->getId()) {
            $person->setId($this->getDb()->insert_id);
        }
        
        return $person;
    }
}
