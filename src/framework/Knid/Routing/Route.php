<?php

namespace Knid\Routing;

class Route
{
    /**
     * @var string
     */
    private $pattern;
    
    /**
     * @var array
     */
    private $defaults;
    
    /**
     * @param string $pattern
     * @param array $defaults
     */
    public function __construct($pattern, array $defaults = array())
    {
        $this->pattern = (string) $pattern;
        $this->defaults = $defaults;
    }
    
    /**
     * @param string $pattern
     * @return array
     */
    public function match($pattern)
    {
        $return = array();
        if ($this->pattern === $pattern) {
            $return = $this->defaults;
        }
        return $return;
    }
}
