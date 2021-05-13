<?php

require_once 'Pokemon.php';

class Bulbasaur extends Pokemon
{
    private $abilities;
    private $img;
    public function __construct($name, $hp, $mp, $abilities, $strength, $weakness, $img)
    {
        parent::__construct($name, $hp, $mp, $strength, $weakness);
        $this->abilities = $abilities;
        $this->img = $img;
    }

    public function setAbilities($abilities){
        $this->$abilities;
    }

    public function getAbilities(){
        return $this->abilities;
    }

    public function setImg($img){
        $this->$img;
    }

    public function getImg(){
        return $this->img;
    }
}
