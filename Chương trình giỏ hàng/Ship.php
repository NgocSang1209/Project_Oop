<?php

interface Ship{
    public function deliveryTime();
    public function deliveryPrice();

}
//cách giao hàng tại khu vực HCM
class HCMArea implements Ship{
    public function deliveryTime(){
        return "Hàng sẽ được giao tới HCM trong 2 ngày tới!";
    }
    public function deliveryPrice(){
        return $price = 25;
    }
}
// Cách giao hàng tại khu vực HN
class HNArea implements Ship{
    public function deliveryTime(){
        return "Hàng sẽ được giao tới HN trong 5 ngày tới!";
    }
    public function deliveryPrice(){
        return $price = 50;
    }
}
