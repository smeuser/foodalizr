<?php

namespace Knid;

abstract class Controller
{
    /**
     * @var \Knid\Mapper\Factory
     */
    private $mapperFactory;
    
    /**
     * @param \Knid\Mapper\Factory $mapperFactory
     */
    public function __construct(Mapper\Factory $mapperFactory)
    {
        $this->mapperFactory = $mapperFactory;
    }
    
    /**
     * @param string $mapperName
     * @return \Knid\Mapper
     */
    protected function getMapper($mapperName)
    {
        return $this->mapperFactory->getMapper($mapperName);
    }
}
