<?php

require_once "Product.php";
require_once "Cart.php";
require_once "CartItem.php";
require_once "Payment.php";
require_once "Account.php";
//them nhân viên 
$nvkvHCM=new Employee("sang","123",1);
$nvkvHN=new Employee("Nam",'456',2);
$dsNv=array($nvkvHCM,$nvkvHN);

// khởi tạo các sản phẩm 
$product1 = new Product(1, "iPhone 11", 25000, 10);
$product2 = new Product(2, "ipad", 40000, 10);
$product3 = new Product(3, "Samsung Galaxy S20", 15000, 10);


//Khởi tạo giỏ hàng
$cart = new Cart();
// thêm 1 sản phẩm vào giỏ hàng từ giỏ hàng
$cartItem1 = $cart->addProduct($product1, 1);
// thêm 1 sản phẩm vào giỏ hàng từ sản phẩm 
$cartItem2 = $product2->addToCart($cart, 1);

//xem số sản phẩm trong giỏ hàng và tổng giá sản phẩm đã mua
echo "Số lượng sản phẩm trong giỏ hàng:";
echo $cart->getTotalQuantity(); 
echo "<br>";
echo "Giá của tổng sản phẩm: ";
echo $cart->getTotalSum();
echo "<br>";
$cart->ListProduct();
echo "<br>";


// //echo $cartItem1->getProduct()->getPrice();

//thêm giảm một sản phẩm trong giỏ hàng
// $cartItem2->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->decreaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();
// $cartItem1->increaseQuantity();

//xem tổng số sản phẩm trong giỏ hàng
echo "Số lượng sản phẩm trong giỏ hàng:";
echo $cart->getTotalQuantity();
echo "<br>";

// xem danh sách sản phẩm trong giỏ hàng
echo "Danh sách sản phẩm trong giỏ hàng:<br>";
$cart->ListProduct();

//Thanh toán 
$tkkh=new Customer("Tuyết","123","HN");
$thanhtoan=new vnd();
echo $thanhtoan->logIn();

echo "<br>";
$thanhtoan->DConfirm($dsNv,$tkkh);
echo "<br>";
echo $thanhtoan->payments($cart,$tkkh);
