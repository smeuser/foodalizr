<?php

namespace Knid\Json\Test;

use Knid\Json\Model;

class ModelTest extends \PHPUnit_Framework_TestCase
{
    public function testPerson()
    {
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ModelMock.php';
        $model = new ModelMock();
        $jsonModel = new Model($model);
        
        $this->assertEquals('{"fooString":"bar","barInteger":42}', (string) $jsonModel);
    }
}
