<?php 

class SingleProduct extends Product
{
	
	public function getType()
	{
		return "Single Product";
	}
	public function getTitle()
	{
		return "Singel Product: " . $this->title;
	}
}