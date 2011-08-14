<?php

namespace Knid\Routing;

class Router
{
    /**
     * @var \SplObjectStorage
     */
    private $routes;
    
    public function __construct()
    {
        $this->routes = new \SplObjectStorage();
    }
    
    /**
     * @param Route $route
     * @return Router
     */
    public function addRoute(Route $route)
    {
        $this->routes->attach($route);
    }
    
    /**
     * @param \Knid\Http\Request $request
     * @return array
     */
    public function route(\Knid\Http\Request $request)
    {
        $requestUri = $request->getServer('REQUEST_URI');
        $requestUri = '/' . substr($requestUri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
        
        foreach ($this->routes as $route) {
            if ($routeParams = $route->match($requestUri)) {
                return $routeParams;
            }
        }
        throw new Exception();
    }
}
