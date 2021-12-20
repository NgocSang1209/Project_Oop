<?php


class Product
{
    private  $id;
    private  $title;
    private  $price;
    private  $availableQuantity;

    // hàm khởi tạo sản phẩm
    public function __construct($id,$title,$price,$availableQuantity)
    {
        $this->id=$id;
        $this->title=$title;
        $this->price=$price;
        $this->availableQuantity=$availableQuantity;

    }
    // hàm lấy Id
    public function getId()
    {
        return $this->id;
    }
    // hàm nhập Id 
    public function setId($id)
    {
        $this->id=$id;
    }
    // hàm lấy tên sản phẩm 
    public function getTitle()
    {
        return $this->title;
    }
    // Hàm nhập tên sản phẩm 
    public function setTitle($title)
    {
        $this->title=$title;
    }
    // Hàm lấy giá sản phẩm 
    public function getPrice()
    {
        return $this->price;
    }
    // Hàm nhập giá sản phẩm
    public function setPrice($price)
    {
        $this->price=$price;
    }
    // hàm lấy số lượng sản phẩm còn trong kho 
    public function getAvailableQuantity()
    {
        return $this->availableQuantity;
    }
    // hàm nhập số lượng sản phẩm còn trong kho
    public function setAvailableQuantity($availableQuantity)
    {
        $this->availableQuantity=$availableQuantity;
    }
    // hàm Thêm sản phẩm vào giỏ hàng
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
       return  $cart->addProduct($this,$quantity);
    }

   // xoá sản phẩm khỏi giỏ hàng
    public function removeFromCart(Cart $cart)
    {
        return $cart->removeProduct($this);
    }
}
