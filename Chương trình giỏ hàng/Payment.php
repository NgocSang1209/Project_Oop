<?php
require_once "Ship.php";
require_once "Account.php";

abstract class Payment{
	// hàm đăng nhập phương thức thanh toán
	abstract function logIn();

	// hàm thanh toán tiền mua hàng
	abstract function payments(Cart $cart,Customer $tkkh);

	public function DConfirm( $ds,Customer $tkkh)
	{
		foreach ($ds as $nv) {
		if($nv->getDeliveryArea()==1&& $tkkh->getAddress()=="HCM"){
		   echo "".$nv->Confirm();
		}
		elseif ($nv->getDeliveryArea()==2&& $tkkh->getAddress()=="HN") echo "".$nv->Confirm();
	}
	}
	//hàm tính tiền sản phẩm đã mua


	public function Pay(Customer $tkkh)
	{
        if($tkkh->getAddress()=="HN"){
            $HnArea= new HNArea();
            return $HnArea->deliveryPrice();
        }
        $HcmArea=new HCMArea();
        return $HcmArea->deliveryPrice();
    }


	public function Bill(Cart $cart,Customer $tkkh)
	{
		$totalSum =$this->Pay($tkkh);
		
        foreach ($cart->getItems() as $item) 
        {
            $totalSum+=$item->getQuantity()*$item->getProduct()->getPrice();
        }
        return $totalSum;
	}

}

// lớp thanh toán bằng vnd 
class vnd extends Payment
{
	public function logIn()
	{
		return "Đã đăng nhập bằng Vnd";
	}

	public function payments(Cart $cart,Customer $tkkh)
	{
		return "Đã thanh toán bằng Vnd:".$this->Bill($cart, $tkkh);
	}

}

// lớp thanh toán bằng paypal
class paypal extends Payment
{

	public function logIn()
	{
		return "Đã đăng nhập bằng Paypal";
	}

	public function payments(Cart $cart,Customer $tkkh)
	{
		return "Đã thanh toán bằng Paypal:".$this->Bill($cart,$tkkh);
	}

}

// lớp thanh toán bằng visa
class visa extends Payment
{

	public function logIn()
	{
		return "Đã đăng nhập bằng Visa";
	}

	public function payments(Cart $cart,Customer $tkkh)
	{
		return "Đã thanh toán bằng Visa:".$this->Bill($cart, $tkkh);
	}
	
}