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
