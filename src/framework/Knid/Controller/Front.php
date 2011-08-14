<?php

namespace Knid\Controller;

use Knid;

class Front
{
    /**
     * @var \Knid\Routing\Router
     */
    private $router;
    
    /**
     * @var \Knid\Controller\Factory
     */
    private $controllerFactory;
    
    /**
     * @param \Knid\Routing\Router $router
     * @param \Knid\Controller\Factory $controllerFactory
     */
    public function __construct(\Knid\Routing\Router $router, Factory $controllerFactory)
    {
        $this->router = $router;
        $this->controllerFactory = $controllerFactory;
    }
    
    /**
     * @param \Knid\Http\Request $request
     * @param \Knid\Http\Response $response
     */
    public function dispatch(\Knid\Http\Request $request, \Knid\Http\Response $response)
    {
        $routeParams = $this->router->route($request);
        
        $actionController = $this->controllerFactory->getController($routeParams['controller']);
        
        $actionName = $routeParams['action'] . 'Action';
        $response = $actionController->$actionName($request, $response);
        
        $response->send();
    }
}
