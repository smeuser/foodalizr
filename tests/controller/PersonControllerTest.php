<?php

namespace Foodalizr\Controller\Test;

class PersonControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $mapperFactory;
    
    protected $request;
    protected $response;
    
    protected $controller;
    
    public function setUp()
    {
        $this->request = $this->getMockBuilder('\\Knid\\Http\\Request')
            ->disableOriginalConstructor()
            ->getMock();
        $this->response = $this->getMockBuilder('\\Knid\\Http\\Response')->getMock();
        
        $this->mapperFactory = $this->getMockBuilder('\\Knid\\Mapper\Factory')
            ->disableOriginalConstructor()
            ->getMock();
        
        $this->controller = new \Foodalizr\Controller\PersonController($this->mapperFactory);
    }
    
    public function testPostWithName()
    {
        $this->markTestIncomplete();
        
        $this->request->expects($this->any())
            ->method('getPost')
            ->with('name')
            ->will($this->returnValue('Max Mustermann'));
        
        $this->response->expects($this->once())
            ->method('setContent')
            ->with('asdf');
        
        $personMapperMock = $this->getMockBuilder('\\Foodalizr\\Mapper\\PersonMapper')
            ->getMock();
        
        $this->mapperFactory->expects($this->any())
            ->method('getMapper')
            ->with('\\Foodalizr\\Mapper\\PersonMapper')
            ->will($this->returnValue($personMapperMock));
        
        $this->controller->postAction($this->request, $this->response);
    }
}
