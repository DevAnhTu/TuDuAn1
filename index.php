<?php
session_start();


include 'app/Database/Database.php';

include 'app/Models/Admin/HomeModel.php';
include 'app/Models/Admin/UserModel.php';
include 'app/Models/Admin/CategoryModel.php';
include 'app/Models/Admin/ProductModel.php';
include 'app/Models/Admin/CommentRatingModel.php';

include 'app/Models/User/CategoryUserModel.php';
include 'app/Models/User/ProductUserModel.php';
include 'app/Models/User/LoginModel.php';
include 'app/Models/User/UserModel2.php';

include 'app/Controllers/Admin/ControllerAdmin.php';
include 'app/Controllers/Admin/HomeController.php';
include 'app/Controllers/Admin/LoginController.php';
include 'app/Controllers/Admin/UserController.php';
include 'app/Controllers/Admin/CategoryController.php';
include 'app/Controllers/Admin/ProductController.php';
include 'app/Controllers/Admin/CommentRatingController.php';

include 'app/Controllers/User/LoginUserController.php';
include 'app/Controllers/User/DashboardController.php';


const BASE_URL = 'http://localhost/duanmvc/';

include 'router/web.php';
// echo password_hash('123456', PASSWORD_BCRYPT);