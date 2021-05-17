<?php 

abstract class Product 
{
	private $sku;
	protected $title;
	private $price;
	private $num_in_stock;
	private $discount;

	public function __construct($title, $price, $num_in_stock, $discount = 0)
	{
		$this->sku = rand(10000, 9999999);

		$this->title = $title;
		$this->price = $price;
		$this->num_in_stock = $num_in_stock;
		$this->discount = $discount;
	}

	// Setters and Getters

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getDiscount()
	{
		return $this->discount;
	}

	public function getNumInStock()
	{
		return $this->num_in_stock;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getSku()
	{
		return $this->sku;
	}

	public function clearStock()
	{
		$this->num_in_stock = 0;
	}

	public function decrementStock($quantity)
	{
		$this->num_in_stock -= $quantity;
	}

	public function incrementStock($quantity)
	{
		$this->num_in_stock += $quantity;
	}

	public function addToCart(Cart $cart, $quantity = 1)
	{
		$cart->addProduct($this, $quantity);
	}

	public function removeFromCart(Cart $cart)
	{
		$cart->removeProduct($this);
	}

	public function PrintProduct()
	{
		echo "SKU: " . $this->sku . ", Title: " . $this->title . ", Price: " . $this->price . ", Num in Stock: " . $this->num_in_stock;
	}

	public abstract function getType();
}