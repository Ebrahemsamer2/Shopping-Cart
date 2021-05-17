<?php

class Cart
{
	private $products;

	public function __construct()
	{
		$this->products = array();
	}

	public function getProducts()
	{
		return $this->products;
	}

	public function addProduct(Product $product, $quantity = 1)
	{
		if($product->getNumInStock() >= $quantity)
		{
			$this->products[$quantity . "__" . $product->getSku()] = $product;
			$product->decrementStock($quantity);
		}
		else 
		{
			echo "Sorry, Quantity is not available in the stok";
		}
	}

	public function removeProduct(Product $product)
	{
		$sku = $product->getSku();
		$product_quantity = 0;
		foreach ($this->products as $key => $product) {
			$product_sku_quantity = explode("__", $key);

			$product_sku = $product_sku_quantity[1];
			$product_quantity = $product_sku_quantity[0];
			if($sku == $product_sku)
			{
				unset($this->products[$key]);
				break;
			}
		}
		$product->incrementStock($product_quantity);
	}

	public function changeProductQuantity(Product $product, $new_quantity)
	{
		$sku = $product->getSku();
		$product_quantity = 0;
		foreach ($this->products as $key => $cart_product) {
			$product_sku_quantity = explode("__", $key);

			$product_sku = $product_sku_quantity[1];
			$product_quantity = $product_sku_quantity[0];
			if($sku == $product_sku)
			{
				unset($this->products[$key]);
				$product->incrementStock($product_quantity);

				if($product->getNumInStock() >= $new_quantity)
				{
					$this->products[$new_quantity . "__" . $sku] = $cart_product;
					if($product_quantity >= $new_quantity)
						$product->incrementStock($product_quantity - $new_quantity);
					else
						$product->decrementStock($new_quantity - $product_quantity);
				}
				break;
			}
		}
	}

	public function printProducts()
	{
		$amount = 0;
		foreach ($this->products as $key => $product) {
			$product_sku_quantity = explode("__", $key);
			$product_sku = $product_sku_quantity[1];
			$product_quantity = $product_sku_quantity[0];

			$discount = ( $product->getDiscount() / 100 ) * $product->getPrice();
			$amount += ( $product->getPrice() * (float)$product_quantity ) - $discount;

			echo "Product Title: " . $product->getTitle() . '. Price: ' . $product->getPrice() . ", Quantity: " . $product_quantity . "<br>";
		}

		echo "Amount: " . $amount;
	}
}