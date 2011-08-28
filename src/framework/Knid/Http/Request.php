<?php

namespace Knid\Http;

class Request
{
    /**
     * @var array
     */
    private $params;
    
    public function __construct(array $params)
    {
        $this->params = array_intersect_key($params, array(
            'cookie' => null,
            'env' => null,
            'files' => null,
            'get' => null,
            'post' => null,
            'server' => null,
        ));
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $type
     * @param string $name
     * @param mixed $value
     * @return void
     */
    private function setParam($type, $name, $value)
    {
        if (!isset($this->params[$type])) {
            throw new \OutOfBoundsException();
        }
        $this->params[$type][$name] = $value;
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $type
     * @param string $name
     * @return string
     */
    private function getParam($type, $name)
    {
        if (!isset($this->params[$type][$name])) {
            throw new \OutOfBoundsException();
        }
        return $this->params[$type][$name];
    }
    
    /**
     * @param array $params
     * @return void
     */
    public function addGetParams($params) {
    	$keys = array();
    	$values = array();

    	$counter = 0;
    	foreach($params as $param) {
    		if($counter++ % 2 == 0) {
    			$keys[] = $param;
    		}
    		else {
    			$values[] = $param;
    			$this->setParam('get', array_pop($keys), array_pop($values));
    		}
    	}
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getCookie($name)
    {
        return $this->getParam('cookie', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getEnv($name)
    {
        return $this->getParam('env', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getFiles($name)
    {
        return $this->getParam('files', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getGet($name)
    {
        return $this->getParam('get', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getPost($name)
    {
        return $this->getParam('post', $name);
    }
    
    /**
     * @throws \OutOfBoundsException
     * @param string $name
     * @return string
     */
    public function getServer($name)
    {
        return $this->getParam('server', $name);
    }
}
