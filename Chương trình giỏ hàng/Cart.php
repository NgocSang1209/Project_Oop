<?php


class Cart
{
    //Mảng items chứa chuỗi sản phẩm trong giỏ hàng
    private  $items = [];
    // lấy giá trị sản phẩm 
    public function getItems()
    {
        return $this->items;
    }
    // nhập giá trị sản phẩm
    public function setItems($items)
    {
        $this->items=$items;
    }

    // thêm sản phẩm vào giỏ hàng
    public function addProduct(Product $product, int $quantity): CartItem
    {
        $cartItem=$this->findCartItem($product->getId());
        if($cartItem===null){
          $cartItem= new CartItem($product,0);
          $this->items[]= $cartItem;
        }
        
        $cartItem->increaseQuantity($quantity);
        return $cartItem;
    }
    // tìm sản phẩm trong giỏ hàng
    private function findCartItem(int $productId)
    {
        return $this->items[$productId] ?? null;
    }

    // xoá sản phẩm khỏi giỏ hàng 
    public function removeProduct(Product $product)
    {
        unset($this->items[$product->getId()-1]);
    }
    //Lấy số lượng sản phẩm trong giỏ hàng
    public function getTotalQuantity():int 
    {
        //TODO Implement method
        $sum =0;
        foreach ($this->items as $item) {
            $sum+= $item->getQuantity();
        }
        return $sum;
    }
    // Tính tổng giá sản phẩm 
    public function getTotalSum(): float
    {
        $totalSum =0;
        foreach ($this->items as $item) {
            # code...
            $totalSum+=$item->getQuantity()*$item->getProduct()->getPrice();
        }
        return $totalSum;
    }
    public function ListProduct()
    {
        foreach ($this->getItems() as $item) 
        {
            echo $item->getProduct()->getTitle();
            echo "<br>";
        }
        
    }
}