<?php 

class User
{
	private $id;
	private $username;
	private $email;

	private $cart;

	public function __construct($username, $email, Cart $cart)
	{
		$this->id = "User_" . rand(100000, 9999999);
		$this->username = $username;
		$this->email = $email;
		$this->cart = $cart;
	}

	public function getCart()
	{
		return $this->cart;
	}

	public function addToCart(Product $product, $quantity = 1)
	{
		$this->cart->addProduct($product, $quantity);
	}

	public function removeFromCart(Product $product)
	{
		$this->cart->removeProduct($product);
	}
	
	public function changeProductQuantity(Product $product, $new_quantity)
	{
		$this->cart->changeProductQuantity($product, $new_quantity);
	}

	public function checkOut()
	{
		$this->cart->printProducts();
	}
}