<?php

namespace Foodalizr\Controller;

use Knid\Http;
use Knid\View;
use Knid\Io;

class IndexController
{
    public function indexAction(Http\Request $request, Http\Response $response)
    {
    	//$templatePath = '/template/html/';
    	$templatePath = '/template/touch/';
    	
    	$page = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'page.phtml') );
    	$head = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'head.phtml') );
    	$content = new View\Template(  new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'index.phtml') );
    	
    	$applicationJs = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'js/application.js') );
    	$contributionModelJs = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'js/model/Contribution.js') );
    	$mealModelJs = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'js/model/Meal.js') );
    	$participationModelJs = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'js/model/Participation.js') );
    	$personModelJs = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'js/model/Person.js') );
    	$spendingModelJs = new View\Template( new Io\File(dirname(dirname(__FILE__)) . $templatePath . 'js/model/Spending.js') );
    	
    	$head->{title} = 'Foodalizr\Controller';
    	$head->{contentType} = 'text/html; charset=utf-8';
    	$head->{cssFiles} = array();
    	$head->{cssFiles}[] = 'css/screen.css';
    	$head->{cssFiles}[] = 'http://senchatouch.me-user.de/resources/css/sencha-touch.css';
    	
    	$head->{jsFiles} = array();
    	$head->{jsFiles}[] = 'http://senchatouch.me-user.de/sencha-touch.js';
    	
    	$head->{inlineJs} = array();
    	$head->{inlineJs}[] = $contributionModelJs->render();
    	$head->{inlineJs}[] = $mealModelJs->render();
    	$head->{inlineJs}[] = $participationModelJs->render();
    	$head->{inlineJs}[] = $personModelJs->render();
    	$head->{inlineJs}[] = $spendingModelJs->render();
    	$head->{inlineJs}[] = $applicationJs->render();
    	
    	$page->{pageHead} = $head->render();
    	$page->{pageBody} = $content->render();
    	
        $response->addHeader(new Http\Header('Content-Type', 'text/html; charset=utf-8'));
        $response->setContent($page->render());
        
        return $response;
    }
}
