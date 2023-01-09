<?php

class Stuff{
    public string $head;
    public string $body;
    public string $weapon;
    function __construct(string $head, string $body, string $weapon)
    {
        $this->head = $head;
        $this->body = $body;
        $this->weapon = $weapon;
    }
}

class Character {
    public string $name;
    public int $health;
    public int $strength;
    public Stuff $stuff;
    
    function __construct(string $name, int $health, int $strength)
    {
        $this->name = $name;
        $this->health = $health;
        $this->strength = $strength;
        
    }

    function loseHealth(int $value){
       $this-> health -= $value;

        if ($this->health <= 0 ):
            echo $this->name . " Vous êtes mort ";
        endif;

    }
    function attack(Character $target){ 
        $target->loseHealth($this->strength);
        if ($this->health>0){
            echo $this->name . " attaque " . $target->name . " et lui inflige " . $this->strength . " dégats. Vie restante " . $this->health . "pv <br>";};
     }
}

class Orc extends Character {

    public int $health = 100;
    public int $strength = 12;
    function __construct(string $name)      // function __construct (string $name, int $health = 100, int $strength = 12)
    {                                       //          {                    
        $this->name = $name;                //              parent:: __contruct($name,$health,$strength);
    }                                       //          }
}

class Hero extends Character {

    public int $health = 150;
    public int $strength = 10;
    function __construct( string $name)     // function __construct (string $name, int $health = 150, int $strength = 10)
    {                                       //          {                    
        $this->name = $name;                //              parent:: __contruct($name,$health,$strength);
    }                                       //          }
}


$orc = new Orc("Grunt");
$hero = new Hero("Hwake");
var_dump($orc);
var_dump($hero);

while($hero->health >0 && $orc->health > 0){
    $hero->attack($orc);
    $orc->attack($hero);
    var_dump($orc);
    var_dump($hero);
}
?>