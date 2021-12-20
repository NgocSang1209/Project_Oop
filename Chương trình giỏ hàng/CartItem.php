<?php


class CartItem
{
    private  $product;
    private  $quantity;

    //Hàm khởi tạo Sản phẩm trong giỏ hàng
    public function __construct(\Product $product , $quantity)
    {
        $this->product=$product;
        $this->quantity =$quantity;
    }
    // hàm lấy sản phẩm trong giỏ hàng
    public function getProduct()
    {
        return $this->product;
    }
    // hàm nhập sản phẩm trong giỏ hàng
    public function setProduct($product)
    {
        $this->product=$product;
    }
    //hàm lấy số lượng sản phẩm trong giỏ hàng
    public function getQuantity()
    {
        return $this->quantity;
    }
    // hàm lấy số lượng của sản phẩm trong giỏ hàng
    public function setQuantity($product)
    {
        $this->quanlity=$quantity;
    }
    // hàm thêm một đơn vị sản phẩm trong giỏ hàng (giới hạn <=10)
    public function increaseQuantity($amount = 1)
    {
        if($this->getQuantity()+ $amount > $this->getProduct()->getAvailableQuantity()){
                    throw new Exception("Số lượng sản phẩm nhiều hơn số lượng trong kho".$this->getProduct()->getAvailableQuantity());  
                }
        $this->quantity += $amount;
    }

    // hàm giảm một đơn vị sản phẩm trong giỏ hàng( giới hạn >=1)
    public function decreaseQuantity($amount=1)
    {
         if($this->getQuantity()- $amount < 1){
                    throw new Exception("Số lượng sản phẩm phải lớn hơn bằng 1");
                }
        $this->quantity -= $amount;
    }
}