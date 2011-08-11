<?php

namespace Knid\Controller;

use Knid;

class Factory
{
    /**
     * @var array
     */
    private $controllers;
    
    /**
     * @var \Knid\Mapper\Factory
     */
    private $mapperFactory;
    
    /**
     * @param \Knid\Mapper\Factory $mapperFactory
     */
    public function __construct(\Knid\Mapper\Factory $mapperFactory)
    {
        $this->controllers = array();
        $this->mapperFactory = $mapperFactory;
    }
    
    /**
     * @param string $controllerName
     * @param Knid\Http\Request $request
     * @param Knid\Http\Response $response
     */
    public function getController($controllerName)
    {
        $controllerName .= 'Controller';
        if (!isset($this->controllers[$controllerName])) {
            $this->controllers[$controllerName] = new $controllerName($this->mapperFactory);
        }
        
        $controller = $this->controllers[$controllerName];
        
        return $controller;
    }
}

