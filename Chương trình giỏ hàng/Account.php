<?php
 require_once "Ship.php";
class Account{
    protected $name;
    protected $pass;

    public function getName()
    {
        return $this->name;
    }
    // hàm nhập Id 
    public function setName($name)
    {
        $this->name=$name;
    }
    // hàm lấy tên sản phẩm 
    public function getPass()
    {
        return $this->pass;
    }
    // Hàm nhập tên sản phẩm 
    public function setPass($pass)
    {
        $this->pass=$pass;
    }
}
class Employee extends Account{
    private $deliveryArea;

    public function getDeliveryArea()
    {
        return $this->deliveryArea;
    }
    // Hàm nhập tên sản phẩm 
    public function setDeliveryArea($deliveryArea)
    {
        $this->deliveryArea=$deliveryArea;
    }
    public function __construct($name,$pass,$deliveryArea)
    {
        $this->name=$name;
        $this->pass=$pass;
        $this->deliveryArea=$deliveryArea;
    }
    public function Confirm(){
        if($this->getDeliveryArea()==1){
            return "Nhân viên tại khu vực HCM sẽ thực hiện giao hàng:".$this->getName();
        }
        else return "Nhân viên tại khu vực HN sẽ thực hiện giao hàng:".$this->getName();

    }
     
}
class Customer extends Account{
    private $address;
    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address=$address;
    }
    public function __construct($name,$pass,$address)
    {
        $this->name=$name;
        $this->pass=$pass;
        $this->address=$address;
    }
}