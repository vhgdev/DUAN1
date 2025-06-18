<?php
class AuthController
{
    //Đăng ký
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            //Mã hóa mật khẩu
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);

            //Đưa vào data
            $data['password'] = $password;

            //insert vào database
            (new User)->create($data);

            //Thông báo
            $_SESSION['message'] = 'Đăng ký thành công';
            header("location: " . ROOT_URL_ . "?ctl=login");
            die;
        }
        $categories = (new Category())->all();

        return view('clients.users.register', compact('categories'));
    }
    //Đăng nhập
    public function login()
    {
        $error =  null;
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = (new User)->findUserOfEmail($email);


            // Kiểm tra mật khẩu
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Đăng nhập thành công
                    $_SESSION['user'] = $user;

                    // Nếu role = 1, vào admin, và ngược lại vào trang chủ
                    if (password_verify($password, $user['password'])) {
                        // Tải lại thông tin mới nhất từ DB
                        $latestUser = (new User)->find($user['id']);

                        $_SESSION['user'] = $latestUser;

                        if ($latestUser['role'] === 'admin') {
                            header("location: " . ROOT_URL_);
                        } else {
                            header("location: " . ROOT_URL_);
                        }
                        exit;
                    }
                } else {
                    $error = "Email hoặc mật khẩu không đúng";
                }
            } else {
                $error = "Email hoặc mật khẩu không đúng";
            }
        }


        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']);

        $categories = (new Category())->all();

        return view('clients.users.login', compact('message', 'error', 'categories'));
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        header("location: index.php");
    }

    public function index()
    {
        $users = (new User)->all();
        return view('admin.users.list', compact('users'));
    }

    public function updateActive()
    {
        $data = $_POST;

        $data['active'] = $data['active'] ? 0 : 1;

        (new User)->updateActive($data['id'], $data['active']);
        return header('location: ' . ADMIN_URL . '?ctl=listuser');
    }

    public function changePasswordForm()
    {
        $error = $_SESSION['error'] ?? '';
        $message = $_SESSION['success'] ?? '';
        unset($_SESSION['error'], $_SESSION['success']);

        $categories = (new Category())->all(); // Thêm dòng này

        return view('clients.users.change-password', compact('error', 'message', 'categories'));
    }


    // Xử lý đổi mật khẩu
    public function handleChangePassword()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Bạn cần đăng nhập để sử dụng chức năng này";
            header("location: " . ROOT_URL_ . "?ctl=login");
            exit;
        }

        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        $user = $_SESSION['user'];

        // Kiểm tra mật khẩu cũ
        if (!password_verify($currentPassword, $user['password'])) {
            $_SESSION['error'] = "Mật khẩu hiện tại không đúng";
            header("location: " . ROOT_URL_ . "?ctl=change-password");
            exit;
        }

        // Kiểm tra mật khẩu mới khớp
        if ($newPassword !== $confirmPassword) {
            $_SESSION['error'] = "Mật khẩu mới không khớp";
            header("location: " . ROOT_URL_ . "?ctl=change-password");
            exit;
        }

        // Cập nhật mật khẩu mới
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        (new User())->updatePassword($user['id'], $hashedPassword);

        // Hủy session và yêu cầu đăng nhập lại
        session_unset();
        session_destroy();

        // Khởi động session mới để gửi thông báo
        session_start();
        $_SESSION['message'] = "Bạn đã đổi mật khẩu thành công. Vui lòng đăng nhập lại.";

        // Chuyển về trang đăng nhập
        header("location: " . ROOT_URL_ . "?ctl=login");
        exit;
    }
}
