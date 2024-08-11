



<?php

// interface  

// interface allows you to specify what methods a class should implement. 


interface FoodItem
{
    public function cost();
}


// This is our basic burger class 

class Burger implements FoodItem
{
    public function cost()
    {
        return 4;
    }
}

// Now decorate with cheese 

class Cheese implements FoodItem
{

    private $item; //private property item for Chess class

    public function __construct(FoodItem $item) //construct method for Chess class 
    {
        $this->item = $item; //this will set the value of item according to constructor paramenter
    }

    public function cost()
    {
        // $this->item ; //this line means item is a instance of a class setted by constructor
        // $this->item->cost() ;//targeting cost() method which is define in FoodItem Interface 
        // and implements by Burger Class for Basic Burger price
        // return $this->item->cost() ; //this line burger instance cost() method 
        return $this->item->cost() + 5; //now the value of burger instance is 4+5=9 from Cheese class instance 
    }
}


class Meat implements FoodItem{

    private $item ; 
    private $meatPrice = 8 ; 

    public function __construct(FoodItem $item)
    {
        $this->item = $item ; 
    }

    public function cost(){
        //burger instance cost + meat price 
        return $this->item->cost() + $this->meatPrice ; 
    }
}



$b = new Burger() ; //creating basic berger instance 
echo $b->cost() ; // getting value from cost() method in Burger class 
echo "\n" ; 
// $c = new Cheese() ; //Cheese class contruct demanding an argument 
$c = new Cheese($b) ; //now we are setting Burger class instance b as parameter
echo $c->cost(); // c->cost() will return Cheese class instance cost() method total cost of basic burger + cheese
echo "\n" ; 

$m = new Meat($b) ; 
echo $m->cost() ; 
echo "\n" ; 

$c_and_m = new Meat($c) ; 

echo $c_and_m->cost() ; 

echo "\n" ; 


