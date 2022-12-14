<?php
trait Weight{
    protected $weight;

    public function getWeight(){
        return $this->weight;
    }

    public function setWeight($_weight, $_unit){
        $this->weight = $_weight . $_unit;
    }
}