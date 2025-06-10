<?php

class CartController
{
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {
        // Giỏ hàng
        $carts = $_SESSION['cart'] ?? [];

        // Lấy id sản phẩm cần thêm vào giỏ hàng
        $id = $_GET['id'];
        // Lấy sản phẩm theo id
        $product = (new Product)->find($id);
        // Kiểm tra xem giỏ hàng có sản phẩm đó chưa
        if (isset($carts[$id])) {
            // Tăng số lượng lên 1
            $carts[$id]['quantity'] = (int) $carts[$id]['quantity'] + 1;  // Chuyển về số nguyên trước khi cộng
        } else {
            $carts[$id] = [
                'name'      => $product['name'],
                'image'     => $product['image'],
                'price'     => $product['price'],
                'quantity'  => 1,  // Sửa 'quantitity' thành 'quantity'
            ];
        }
        // Gán lại giỏ hàng cho session
        $_SESSION['cart'] = $carts;

        // Tính tổng số lượng
        $_SESSION['totalQuantity'] = $this->totalQuantityInCart();

        // Lấy lại URI trước đó
        $uri = $_SESSION['URI'];

        return header("Location: " . $uri);
    }

    // Tính tổng số lượng sản phẩm trong giỏ hàng
    public function totalQuantityInCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += (int) $cart['quantity'];  // Chuyển về số nguyên trước khi cộng
        }
        return $total;
    }

    // Tính tổng giá trong giỏ hàng
    public function totalPriceInCart()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += (int) $cart['price'] * (int) $cart['quantity'];  // Chuyển về số nguyên
        }
        return $total;
    }

    // Hàm hiển thị chi tiết giỏ hàng
        public function viewCart()
        {
            $carts = $_SESSION['cart'] ?? [];

            $categories = (new Category)->all();

            $totalPrice = $this->totalPriceInCart();

            return view('clients.carts.cart', compact('carts', 'categories', 'totalPrice'));
        }

        

    // Xóa sản phẩm trong giỏ hàng
    public function deleteProductInCart()
    {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);

        // Tính tổng số lượng
        $_SESSION['totalQuantity'] = $this->totalQuantityInCart();
        return header("location: " . ROOT_URL_ . "?ctl=view-cart");
    }

    // Cập nhật giỏ hàng
    public function updateCart()
    {
        $quantities = $_POST['quantity'];
        // Cập nhật số lượng
        foreach ($quantities as $id => $qty) {
            $_SESSION['cart'][$id]['quantity'] = (int) $qty;  // Chuyển về số nguyên trước khi lưu
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
        $sumPrice = $this->totalPriceInCart();
        return view("clients.carts.checkout", compact('user', 'carts', 'sumPrice'));
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
    
        
        $sumPrice = $this->totalPriceInCart();
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
    
        
        // return header("location: " . ROOT_URL_ . "?ctl=order-success");
        return header("location: " . ROOT_URL_ . '?ctl=success');
    }

    public function clearCart()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);

    }

    public function success()
    {
        return view("clients.carts.success");

    }
}
