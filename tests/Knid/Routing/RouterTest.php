<?php

namespace Knid\Routing\Test;

use Knid\Routing\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    protected $router;
    
    public function setUp()
    {
        $this->router = new Router();
    }
    
    public function testAddRouteAndMatch()
    {
        $route = $this->getMockBuilder('\\Knid\\Routing\\Route')
            ->disableOriginalConstructor()->getMock();
        
        $route->expects($this->any())
            ->method('match')
            ->with('/foo/bar')
            ->will($this->returnValue(array('controller' => '\\Knid\\Controller')));
        
        $this->router->addRoute($route);
        
        $request = $this->getMockBuilder('\\Knid\\Http\\Request')
            ->disableOriginalConstructor()->getMock();
        
        $request->expects($this->any())
            ->method('getServer')
            ->with('REQUEST_URI')
            ->will($this->returnValue('/foo/bar'));
        
        $this->assertEquals(array('controller' => '\\Knid\Controller'), $this->router->route($request));
    }
}
