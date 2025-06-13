<?php
class Cart
{
    public function totalPriceInCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += (int)$cart['price'] * (int)$cart['quantity'];
        }
        return $total;
    }
}
