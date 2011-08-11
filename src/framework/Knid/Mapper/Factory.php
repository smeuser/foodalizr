<?php

namespace Knid\Mapper;

class Factory
{
    /**
     * @var \mysqli
     */
    private $db;
    
    /**
     * @var array
     */
    private $mappers = array();
    
    /**
     * @param \mysqli $db
     */
    public function __construct(\mysqli $db)
    {
        $this->db = $db;
    }
    
    /**
     * @param string $mapperName
     * @return \Knid\Mapper
     */
    public function getMapper(\Knid\Mapper $mapperName)
    {
        if (!isset($this->mappers[$mapperName])) {
            $this->mappers[$mapperName] = new $mapperName($this->db);
        }
        return $this->mappers[$mapperName];
    }
}
