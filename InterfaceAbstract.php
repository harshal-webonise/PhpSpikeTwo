<?php
interface Human 
{
 public function getName();
 public function setName($name);
}

abstract class Military 
{
 private $rank;

 public function rank($rank) 
         {
            $this->rank = $rank;
         }
 public function setRank($rank) 
         {
            $this->rank = $rank;
        }
 public function getRank()
         {
            return $this->rank;
        }
}//end of abstract class

class Soldier extends Military implements Human 
{
 private $name;
 public function rank($name, $rank) 
 {
 $this->name = $name;
 parent::rank($rank); # parent::setName($rank);
 }
 public function setName($name)
         {
            $this->name = $name;
        }
 public function getName()
         {
        return "My name is: " . $this->name . "<br />";
          }
 public function getRank() 
         {
            return "My rank is: " . parent::getRank() . "<br />";;
         }
 public function getFull() 
         {
            return "I am " . parent::getRank() . " {$this->name}<br />";
         }
}

$goodSoldier = New Soldier('Harshal', 'Kapil');

echo $goodSoldier->getName();
echo $goodSoldier->getRank();
echo $goodSoldier->getFull();
echo "<br />";
$goodSoldier->setRank('Colonel');
$goodSoldier->setName('Brigadior');
echo $goodSoldier->getName();
echo $goodSoldier->getRank();
echo $goodSoldier->getFull();

?>