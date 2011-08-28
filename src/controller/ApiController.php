<?php

namespace Foodalizr\Controller;

use Knid\Http;
use Knid\View;
use Knid\Io;

class ApiController
{
    /**
     * @var \Knid\Controller\Factory
     */
    private $contentTypeFactory;
    
    /**
     * @return $this
     */
    public function __construct()
    {
        $this->contentTypeFactory = new \Knid\Helper\Content\Type\Factory;
    }
	
    public function createAction(Http\Request $request, Http\Response $response)
    {
    	$contentType = $this->contentTypeFactory->getContentTypeHeaderString($request->getGet('type'));
    	
        $response->addHeader(new Http\Header('Content-Type', $contentType));
        $response->setContent($page->render());
        
        return $response;
    }
    
    public function editAction(Http\Request $request, Http\Response $response)
    {
    	$contentType = $this->contentTypeFactory->getContentTypeHeaderString($request->getGet('type'));
    	
        $response->addHeader(new Http\Header('Content-Type', $contentType));
        $response->setContent($page->render());
        
        return $response;
    }
    
    public function deleteAction(Http\Request $request, Http\Response $response)
    {
    	$contentType = $this->contentTypeFactory->getContentTypeHeaderString($request->getGet('type'));
    	
        $response->addHeader(new Http\Header('Content-Type', $contentType));
        $response->setContent($page->render());
        
        return $response;
    }
    
    public function viewAction(Http\Request $request, Http\Response $response)
    {
    	$contentType = $this->contentTypeFactory->getContentTypeHeaderString($request->getGet('type'));
    	
        $response->addHeader(new Http\Header('Content-Type', $contentType));
        $response->setContent($page->render());
        
        return $response;
    }
    
    public function listAction(Http\Request $request, Http\Response $response)
    {
    	$contentType = $this->contentTypeFactory->getContentTypeHeaderString($request->getGet('type'));
    	$modelType = $request->getGet('model');
    	
        $response->addHeader(new Http\Header('Content-Type', $contentType));
        $response->setContent($page->render());
        
        return $response;
    }
}
