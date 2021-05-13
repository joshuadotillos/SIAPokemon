<?php

class Pokemon{
    private $name;
    private $hp;
    private $mp;

    //for pokemon user
    private $strength;
    private $weakness;

    public function __construct($name, $hp, $mp, $strength, $weakness)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->strength = $strength;
        $this->weakness = $weakness;
    }

    public function setName($name){
        $this->$name;
    }

    public function setHp($hp){
        $this->hp = $hp;
    }

    public function setMp($mp){
        $this->mp = $mp;
    }

    public function setStrength($strength){
        $this->$strength;
    }

    public function setWeakness($weakness){
        $this->$weakness;
    }

    public function getName(){
        return $this->name;
    }

    public function getHp(){
        return $this->hp;
    }

    public function getMp(){
        return $this->mp;
    }

    public function getStrength(){
        return $this->strength;
    }

    public function getWeakness(){
        return $this->weakness;
    }
}

