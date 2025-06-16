<?php
class Cart
{
    public function totalPriceInCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;

        // Tính tổng tiền giỏ hàng trước khi giảm giá
        foreach ($carts as $cart) {
            $total += (int)$cart['price'] * (int)$cart['quantity'];
        }

        // Nếu có mã giảm giá trong session thì áp dụng
        if (isset($_SESSION['coupon'])) {
            $coupon = $_SESSION['coupon'];

            if ($coupon['discount_type'] === 'percent') {
                // Giảm theo phần trăm
                $discount = $total * ($coupon['discount_value'] / 100);
            } else {
                // Giảm theo số tiền cố định
                $discount = $coupon['discount_value'];
            }

            // Trừ giảm giá, không để tổng tiền < 0
            $total -= $discount;
            if ($total < 0) {
                $total = 0;
            }
        }

        return $total;
    }
}
