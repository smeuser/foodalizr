<?php

namespace Knid\Helper\Content\Type;

use Knid;

class Factory
{
    /**
     * @var array
     */
    private $contentTypes;
    
    /**
     * @var array
     */
    private $contentModels;
    
    public function __construct()
    {
        $this->contentTypes = array(
        	'html' => 'text/html;',
        	'json' => 'application/json;',
        );
        
        $this->contentModels = array(
        	'json' => 'Json\Model',
        );
    }
    
    /**
     * @param string $type
     * return string $content-type
     */
    public function getContentTypeHeaderString($type, $encoding = 'charset=utf-8')
    {
        if(!isset($this->contentTypes[$type])) {
        	throw new OutOfBoundsException();
        }
        return $this->contentTypes[$type] . ' ' . $encoding;
    }
    
    /**
     * @param string $type
     * @param string $model
     * return mixed $contentModel
     */
    public function getContentModel($type, $model)
    {
        if(!isset($this->contentModels[$type])) {
        	throw new OutOfBoundsException();
        }
        return new $this->contentModels[$type]($model);
    }
}

