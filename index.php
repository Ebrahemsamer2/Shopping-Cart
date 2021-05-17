<?php 

require_once "classes/Product.class.php";
require_once "classes/SingleProduct.class.php";
require_once "classes/VariantProduct.class.php";
require_once "classes/Cart.class.php";
require_once "classes/User.class.php";

$product1 = new VariantProduct("IPhone 11", 2000, 100, 10, ['size' => 'M', 'color' => 'red']);
$product2 = new SingleProduct("DELL Core I5", 1500, 100, 5);
$product3 = new SingleProduct("DELL Core I5", 1280.6, 100, 5);

$ahmed_cart = new Cart;

$ahmed = new User("Ahmed", "Ahmed@yahoo.com", $ahmed_cart);
$ahmed->addToCart($product1);
$ahmed->addToCart($product2);
$ahmed->addToCart($product3);

$ahmed->changeProductQuantity($product2, 20);
echo $ahmed->checkOut();