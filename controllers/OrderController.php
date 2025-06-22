    <?php


    class OrderController
    {
        public function index()
        {
            $orders = (new Order)->all();
            return view("admin.orders.list", compact('orders'));
        }

public function showOrder()
{
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id) {
        return view("admin.errors.error", ['message' => 'ID đơn hàng không hợp lệ']);
    }

    $message = '';

    // Thay đổi trạng thái
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['status'])) {
        $newStatus = (int)$_POST['status'];
        $order = (new Order)->find($id);
        
        // Kiểm tra chuyển đổi trạng thái hợp lệ
        $allowedTransitions = [
            1 => [2, 4], // Chờ xử lý -> Đang xử lý, Hủy
            2 => [3],    // Đang xử lý -> Đã hoàn thành
            3 => [],     // Đã hoàn thành -> Không cho phép chuyển đổi
            4 => [],     // Hủy -> Không cho phép chuyển đổi
        ];

        if (isset($order['status']) && in_array($newStatus, $allowedTransitions[$order['status']] ?? [])) {
            if ((new Order)->updateStatus($id, $newStatus)) {
                $message = "Cập nhật trạng thái đơn hàng thành công!";
            } else {
                $message = "Không thể cập nhật trạng thái. Vui lòng thử lại.";
            }
        } else {
            $message = "Trạng thái không hợp lệ hoặc không thể thay đổi.";
        }
    }

    $order = (new Order)->find($id);
    $order_details = (new Order)->listOrderDetail($id);
    $status = (new Order)->status_details;

    return view("admin.orders.detail", compact('order', 'order_details', 'status', 'message'));
}

        //Hiển thị danh sách hóa đơn của user theo id
        public function showOrderUser()
        {
            $user_id = $_SESSION['user']['id'];

            $orders = (new Order)->findOrderUser($user_id);

            $user = $_SESSION['user'];

            // dd($orders);
            $categories = (new Category)->all();

            return view("clients.users.list-order", compact('orders', 'categories', 'user'));
        }


        public function detailOrderUser()
        {
            $id = $_GET['id'];
            $message = '';

            // Thay đổi trạng thái
            if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['status'])) {
                $newStatus = (int)$_POST['status'];
                $order = (new Order)->find($id);

                // Kiểm tra chuyển đổi trạng thái hợp lệ
                $allowedTransitions = [
                    1 => [2, 4], // Chờ xử lý -> Đang xử lý, Hủy
                    2 => [3],    // Đang xử lý -> Đã hoàn thành
                    3 => [],     // Đã hoàn thành -> Không cho phép chuyển đổi
                    4 => [],     // Hủy -> Không cho phép chuyển đổi
                ];

                if (isset($order['status']) && in_array($newStatus, $allowedTransitions[$order['status']] ?? [])) {
                    (new Order)->updateStatus($id, $newStatus);
                    $message = "Cập nhật trạng thái thành công";
                } else {
                    $message = "Trạng thái không hợp lệ hoặc không thể thay đổi.";
                }
            }

            $order = (new Order)->find($id);
            $order_details = (new Order)->listOrderDetail($id);
            $status = (new Order)->status_details;
            $categories = (new Category())->all();

            return view("clients.users.detail-order", compact('order', 'order_details', 'status', 'message', 'categories'));
        }
    }
