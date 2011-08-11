<?php

namespace Foodalizr\Controller;

use Knid\Http;

class IndexController
{
    public function indexAction(Http\Request $request, Http\Response $response)
    {
        $response->addHeader(new Http\Header('Content-Type', 'text/html; charset=utf-8'));
        $response->setContent('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
            <html>
            <head>
                <title>Foodalizr</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            
                <link rel="stylesheet" type="text/css" href="css/screen.css" />
            </head>
            <body>
            
            <ul class="nav">
                <li><a href="#" class="add meal-add">Essen</a></li>
                <li><a href="#" class="add person-add">Person</a></li>
            </ul>
            
            </body>
            </html>');
        
        return $response;
    }
}
