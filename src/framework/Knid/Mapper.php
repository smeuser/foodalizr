<?php

namespace Knid;

abstract class Mapper
{
    /**
     * @var \mysqli
     */
    private $db;
    
    /**
     * @param \mysqli $db
     */
    public final function __construct(\mysqli $db)
    {
        $this->db = $db;
    }
    
    /**
     * @return \mysqli
     */
    protected final function getDb()
    {
        return $this->db;
    }
    
    /**
     * Returns the table of the entity to persist
     * 
     * @return string
     */
    abstract protected function getTableName();
}
