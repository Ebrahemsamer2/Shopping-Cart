<?php 

class VariantProduct extends Product
{
	private $variables;

	public function __construct($title, $price, $num_in_stock, $discount = 0, $variables)
	{
		parent::__construct($title, $price, $num_in_stock, $discount);
		$this->variables = $variables;
	}

	public function setVariables($variables)
	{
		$this->variables = $variables;
	}
	public function getVariables()
	{
		return $this->variables;
	}

	public function getTitle()
	{
		return "Vaiant Product: " . $this->title;
	}

	public function getType()
	{
		return "Variant Product";
	}

}