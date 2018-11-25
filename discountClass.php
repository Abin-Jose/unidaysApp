<?php 

class UnidaysDiscountChallenge{

    public $totalPrice = 0;
    public $prdtArr = array("A"=>0,"B"=>0,"C"=>0,"D"=>0,"E"=>0);
   

    function __construct() {
       //echo "constructor called";
    }


    function addtoBasket($item){
        $_SESSION['delivery'] = 50;
        if(!isset($_SESSION['basket'])){
            $_SESSION['basket'] = $this->prdtArr;
        }
        foreach ($_SESSION['basket'] as $key => $value) {
            if($key == $item){
                $_SESSION['basket'][$key] = $value+1 ;
            }
        }
        $this->calculatePrice();
    }

    function calculatePrice(){
        
        foreach ($_SESSION['basket'] as $key => $value) {
            switch ($key) {
                case 'A':
                    $price = 8;
                    $this->totalPrice = $this->totalPrice+($price*$value);
                    break;
                case 'B':
                    $price = 12;
                    $this->totalPrice = $this->totalPrice+(((floor($value/2))*20)+(($value - ((floor($value/2))*2))*12));
                    break; 
                case 'C':
                    $price = 4;
                    $this->totalPrice = $this->totalPrice+(((floor($value/3))*10)+(($value - (floor($value/3)*3))*4));
                    break;
                case 'E':
                    $price = 5;
                    $this->totalPrice = $this->totalPrice+(((floor($value/3))*2)+(($value - ((floor($value/3))*3))*5));
                    break;
                case 'D':
                    $price = 7;
                    $this->totalPrice = $this->totalPrice+( ($value*7)-((floor($value/2))*7));
                    break;        
                default:
                    break;
            }
        }
        $_SESSION['totalPrice'] = $this->totalPrice;
        if($this->totalPrice > 50){
            $_SESSION['delivery'] = 0; 
        }
    }
}


?>