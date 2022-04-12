<?php
class Unit
{
     public $name;
     public $health;
     public $mana;

     public function __construct($name = null, $health = null, $mana = null)
     {
         $this->name = $name;
         $this->health = $health;
         $this->mana = $mana;
     }

     public function info ()
     {
         echo "я {$this->name}, у меня {$this->health} здоровья и {$this->mana} маны<br>";
     }

    public function takeDamage(DD $target)
    {
        echo "я {$this->name}, я получил {$target->damage} урона от {$target->name}, у меня осталось {$this->health} здоровья<br>";
    }
}


class DD extends Unit
{
    public $damage;
    public function __construct($name = null, $health = null, $mana = null, $damage = null)
    {
        parent::__construct($name, $health, $mana);
        $this->damage = $damage;
    }
    public function info ()
    {
        parent::info();
        echo "я умею наносить {$this->damage} урона<br>";
    }
    public function attack(Unit $target)
    {
        $target->health -= $this->damage;
        echo "{$this->name} атаковал {$target->name} и нанес {$this->damage} урона<br>";
        $target->info();
        echo "<br>";
    }
}

class Healer extends Unit
{
    public $healing;
    public function __construct($name = null, $health = null, $mana = null, $healing = null)
    {
        parent::__construct($name, $health, $mana);
        $this->healing = $healing;
    }
    public function info ()
    {
        parent::info();
        echo "я умею восстанавливать {$this->healing} здоровья<br>";
        echo "<br>";
    }
    public function healing(Unit $target)
    {
        $target->health += $this->healing;
        echo "{$this->name} вылечил {$target->name} и восстановил {$this->healing} здоровья<br>";
        $target->info();
        echo "<br>";
    }
}

$dummy = new Unit('Dummy', 100000, 50);

$mage = new DD('Mage', 1000, 500, 200);

$war = new DD("Warrior", 2000, 150, 300);

$healer = new Healer('Healer', 2500, 500, 30);


$dummy->info();
$mage->info();
$war->info();
$healer->info();
$mage->attack($dummy);
$war->attack($dummy);
$mage->attack($war);
$healer->healing($war);
$dummy->takeDamage($mage);




