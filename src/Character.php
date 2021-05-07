<?php

namespace App;


class Character {
    public $health = 1000;
    public $level = 1;
    public $isAlive = true;
    public $range;
    public $distance = 0;
    public function attacking(Character $characterVictim, int $damage, int $distance):void
    {   
        if ($this->range < $distance) {
            return;
        }
        if ($this === $characterVictim){
            return;
        }
        if ($characterVictim->level - $this->level >= 5){
            $damage = $damage / 2;
        }
        if ($this->level - $characterVictim->level >= 5 && $characterVictim->level != $this->level){
            $damage = $damage * 2;
        }
        
        $characterVictim->health -= $damage;
        if($characterVictim->health <= 0) {
            $characterVictim->isAlive = false;
            $characterVictim->health = 0;
        }
        
    }
    public function healing(Character $characterVictim, int $heal):void 
    {
        if ($this != $characterVictim) {
            return;
        }
        if($characterVictim->health > 0) {
        $characterVictim->health += $heal;

        if($characterVictim->health > 1000) {
            $characterVictim->health = 1000;
        }
    }
    }

}
