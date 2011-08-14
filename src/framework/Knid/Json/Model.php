<?php

namespace Knid\Json;

class Model
{
    private $model;
    
    public function __construct($model)
    {
        $this->model = $model;
    }
    
    public function __toString()
    {
        $jsonData = array();
        
        foreach ($this->getGetters() as $property => $getter) {
            $jsonData[$property] = $this->model->$getter();
        }
        
        return json_encode($jsonData, JSON_FORCE_OBJECT);
    }
    
    /**
     * Returns the objects getters
     * 
     * @return array
     */
    private function getGetters()
    {
        $getters = array();
        $methods = get_class_methods($this->model);
        
        foreach ($methods as $method) {
            if (preg_match('/^(is|get)([A-Z]+.*)/', $method, $matches)) {
                $getters[lcfirst($matches[2])] = $method;
            }
        }
        
        return $getters;
    }
}
