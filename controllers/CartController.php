<?php
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Coupon.php';

class CartController
{
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $id = $_GET['id'];
        $product = (new Product)->find($id);

        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
        } else {
            $carts[$id] = [
                'name'     => $product['name'],
                'image'    => $product['image'],
                'price'    => $product['price'],
                'quantity' => 1,
            ];
        }

        $_SESSION['cart'] = $carts;
        $_SESSION['totalQuantity'] = $this->totalQuantityInCart();

        $uri = $_SESSION['URI'];
        return header("Location: " . $uri);
    }

    public function totalQuantityInCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += (int) $cart['quantity'];
        }
        return $total;
    }

    public function totalPriceInCartRaw()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += (int)$cart['price'] * (int)$cart['quantity'];
        }
        return $total;
    }

    public function calculateDiscount($totalPrice)
    {
        $discount = 0;
        $coupon = $_SESSION['coupon'] ?? null;

        if ($coupon) {
            if ($coupon['discount_type'] === 'percent') {
                $discount = min($totalPrice * ($coupon['discount_value'] / 100), $totalPrice);
            } else {
                $discount = min($coupon['discount_value'], $totalPrice);
            }
        }

        return $discount;
    }

    public function totalPriceWithDiscount()
    {
        $total = $this->totalPriceInCartRaw();
        $discount = $this->calculateDiscount($total);
        return max(0, $total - $discount);
    }

    // Hiển thị giỏ hàng
    public function viewCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $categories = (new Category())->all();

        $totalPrice = $this->totalPriceInCartRaw();
        $discount = $this->calculateDiscount($totalPrice);
        $finalPrice = max(0, $totalPrice - $discount);
        $coupon = $_SESSION['coupon'] ?? null;

        return view('clients.carts.cart', [
            'carts' => $carts,
            'categories' => $categories,
            'totalPrice' => $totalPrice,
            'discount' => $discount,
            'finalPrice' => $finalPrice,
            'coupon' => $coupon
        ]);
    }

    public function deleteProductInCart()
    {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);
        $_SESSION['totalQuantity'] = $this->totalQuantityInCart();
        return header("location: " . ROOT_URL_ . "?ctl=view-cart");
    }

    public function updateCart()
    {
        $quantities = $_POST['quantity'];
        foreach ($quantities as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = (int) $qty;
        }
        return header("Location: " . ROOT_URL_ . "?ctl=view-cart");
    }

    public function viewCheckOut()
    {
        if (!isset($_SESSION['user'])) {
            return header("location: " . ROOT_URL_ . '?ctl=login');
        }

        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];

        $totalPrice = $this->totalPriceInCartRaw();
        $discount = $this->calculateDiscount($totalPrice);
        $sumPrice = max(0, $totalPrice - $discount);

        return view("clients.carts.checkout", compact('user', 'carts', 'sumPrice', 'discount'));
    }

    public function checkOut()
    {
        $user_id = $_POST['user_id'] ?? null;
        $fullname = $_POST['fullname'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $address = $_POST['address'] ?? null;
        $payment_method = $_POST['payment_method'] ?? null;

        if (!$user_id || !$fullname || !$phone || !$address || !$payment_method) {
            die("Missing required checkout information. Please try again.");
        }

        $user = [
            'id' => $user_id,
            'fullname' => $fullname,
            'phone' => $phone,
            'address' => $address,
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];
        (new User)->update($user_id, $user);

        $totalPrice = $this->totalPriceInCartRaw();
        $discount = $this->calculateDiscount($totalPrice);
        $sumPrice = max(0, $totalPrice - $discount);

        $order = [
            'user_id' => $user_id,
            'status' => 1,
            'payment_method' => $payment_method,
            'total_price' => $sumPrice,
        ];
        $order_id = (new Order)->create($order);

        $carts = $_SESSION['cart'] ?? [];
        foreach ($carts as $id => $cart) {
            $order_detail = [
                'order_id' => $order_id,
                'product_id' => $id,
                'price' => $cart['price'],
                'quantity' => $cart['quantity'],
            ];
            (new Order)->createOrderDetail($order_detail);
        }

        $this->clearCart();
        return header("location: " . ROOT_URL_ . '?ctl=success');
    }

    public function clearCart()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
        unset($_SESSION['coupon']);
    }

    public function success()
    {
        return view("clients.carts.success");
    }

    public function applyCoupon()
    {
        $code = trim($_POST['coupon_code']);
        $couponModel = new Coupon();
        $coupon = $couponModel->findByCode($code);

        if ($coupon && strtotime($coupon['expiry_date']) >= time()) {
            $_SESSION['coupon'] = $coupon;
            $_SESSION['success'] = "Áp dụng mã thành công!";
        } else {
            unset($_SESSION['coupon']);
            $_SESSION['error'] = "Mã không hợp lệ hoặc đã hết hạn!";
        }

        header("Location: " . ROOT_URL_ . "?ctl=view-cart");
    }
}
