<?php

namespace Foodalizr\Mapper;

use Knid\Mapper;
use Foodalizr\Model;

class MealMapper extends Mapper
{
     const QUERY_FIND = 'SELECT `name`, `date` FROM `meal` WHERE `id` = :id;';
     
    /**
     * Returns the meal with the given id
     * 
     * @throws \InvalidArgumentException
     * @throws \OutOfBoundsException
     * @param int $id
     * @return \Foodalizr\Model\Meal
     */
    public function find($id)
    {
        list($name, $date) = parent::find($id);
        
        $meal = new Model\Meal();
        $meal->setId($id);
        $meal->setName($name);
        $meal->setDate(new Date($date));
        return $meal;
    }
}
