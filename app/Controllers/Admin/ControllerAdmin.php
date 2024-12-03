<?php
class ControllerAdmin{
    public function __construct(){
        if (!isset($_SESSION['users'])) {
            $_SESSION['error'] = "Bạn cần đăng nhập trước";
            header("location: ".BASE_URL."?role=admin&act=login");
            exit;
        }
    }
    
}