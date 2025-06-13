<?php

/**
 * Hàm view để render view từ đường dẫn được chỉ định
 * $path_view: đường dẫn tới file view trong thư mục views
 * $data: là dữ liệu được gửi từ controller vào view
 */
function view($path_view, $data = [])
{
    extract($data);

    $path_view = str_replace(".", "/", $path_view);

    include_once ROOT_DIR . "/views/$path_view.php";

}   


// chuyển đổi trạng thái đơn hàng
function getOrderStatus($status)
{
    $status_details = [
        1 => 'chờ xử lí',
        2 => 'đang xử lí',
        3 => 'hoàn thành',
        4 => 'đã hủy',
    ];
    return $status_details[$status];
}
