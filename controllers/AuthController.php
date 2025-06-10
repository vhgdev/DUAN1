<?php
class AuthController{
    //Đăng ký
    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data= $_POST;
            //Mã hóa mật khẩu
            $password=$_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);

            //Đưa vào data
            $data['password']=$password;

            //insert vào database
            (new User)->create($data);

            //Thông báo
            $_SESSION['message']= 'Đăng ký thành công';
            header("location: " .ROOT_URL_ ."?ctl=login");
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
                if ($user['role'] == 'admin'){
                    header("location: " . ADMIN_URL);
                } header("location: " . ROOT_URL_);

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

    public function index() {
        $users = (new User)->all();
        return view('admin.users.list', compact('users'));
    }

    public function updateActive() {
        $data = $_POST;

        $data['active'] = $data['active'] ? 0 : 1;

        (new User)->updateActive($data['id'], $data['active']);
        return header('location: ' . ADMIN_URL . '?ctl=listuser');
    }
}