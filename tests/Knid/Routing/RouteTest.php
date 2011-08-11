<?php

namespace Knid\Routing\Test;

use Knid\Routing\Route;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    protected $route;
    
    public function setUp()
    {
        $this->route = new Route('/foo/bar', array('controller' => '\\Knid\\Controller'));
    }
    
    public function testRouteMatch()
    {
        $this->assertEquals(array('controller' => '\\Knid\\Controller'), $this->route->match('/foo/bar'));
    }
    
    public function testRouteNotMatch()
    {
        $this->assertEquals(array(), $this->route->match('/far/bar'));
    }
}
