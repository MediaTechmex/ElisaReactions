<?php
namespace common\models;

class Movie Extends BaseMovie {
    
    static $weights;
    
    private $sorted;
    
    public function getSortedReactions(){
        if(!isset($this->sorted)){
            $this->sorted = Reaction::countReactions($this->id);
            return $this->sorted;
        } else {
            return $this->sorted;
        }
    }
    
}
