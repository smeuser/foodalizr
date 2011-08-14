<?php

namespace Foodalizr\Controller;

use Knid\Http;

use Foodalizr\Model;

class PersonController extends \Knid\Controller
{
    public function postAction(Http\Request $request, Http\Response $response)
    {
        $response->addHeader(new Http\Header('Content-Type', 'application/json; charset=utf-8'));
        
        try {
            $person = new Model\Person();
            $person->setName($request->getPost('name'));
            $personMapper = $this->getMapper('\\Foodalizr\\Mapper\\PersonMapper');
            $personMapper->save($person);
            
            $response->setContent(json_encode($person));
        }
        catch (\OutOfBoundsException $e) {
            $reponse->setContent(json_encode($e));
        }
        
        return $response;
    }
}
