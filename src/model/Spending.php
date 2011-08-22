<?php

namespace Foodalizr\Model;

use Foodalizr\Model;

class Spending extends Model\Transaction
{
    /**
     * @var int
     */
    private $mealId;
    
    /**
     * @return int
     */
    public function getMealId()
    {
        return $this->mealId;
    }
    
    /**
     * @param int $mealId
     * @return \Foodalizr\Model\Spending
     */
    public function setMealId($mealId)
    {
        if (null !== $mealId) {
            $mealId = (int) $mealId;
        }
        $this->mealId = $mealId;
        return $this;
    }
}
