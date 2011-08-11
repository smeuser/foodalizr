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
        foreach ($this->routes as $route) {
            if ($routeParams = $route->match($request->getServer('REQUEST_URI'))) {
                return $routeParams;
            }
        }
    }
}
