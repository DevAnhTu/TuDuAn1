<?php
class CategoryController extends ControllerAdmin{
    public function getAllCategory(){
        $categoryModel = new CategoryModel();
        $listCategory = $categoryModel->getAllCategory();
        include 'app/Views/Admin/categories.php';
    }
    public function addCategory(){
        include"app/Views/Admin/add-category.php";
    }
    public function addPostCategory(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!$this->checkValidate()){
                header("Location:".BASE_URL."?role=admin&act=add-category");
                exit;
            }
            $categoryModel = new CategoryModel();
            $message = $categoryModel->addCategory();

            if ($message) {
                $_SESSION['message']="Thêm mới thành công";
                header("location: ".BASE_URL."?role=admin&act=all-category");
                exit;
            }else{
                $_SESSION['message']="Thêm mới không thành công";
                header("location: ".BASE_URL."?role=admin&act=add-category");
                exit;   
            }
        }
    }
    public function checkValidate(){
        $name = $_POST['name'];
       
        if($name != "" ){
            return true;
        }else{
            $_SESSION['error']= "Bạn nhập thiếu thông tin";
            return false;
        }
    }
    public function deleteCategory(){
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn category cần xóa"; 
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }
        $categoryModel = new CategoryModel();
        $message = $categoryModel->deleteCategory();
        if ($message) {
            $_SESSION['message']="Xóa thành công";
            header("location: ".BASE_URL."?role=admin&act=all-category");
            exit;
        }else{
            $_SESSION['message']="Xóa không thành công";
            header("location: ".BASE_URL."?role=admin&act=add-category");
            exit;   
        }
    }
    public function updateCategory(){
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn category cần xóa"; 
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryById();
        include 'app/Views/Admin/updateCategory.php';
    }
    public function updatePostCategory(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (!isset($_GET['id'])) {
                $_SESSION['message'] = "Vui lòng chọn category cần xóa"; 
                header("Location: " . BASE_URL . "?role=admin&act=all-category");
                exit;
            }
            if(!$this->checkValidate()){
                header("Location:".BASE_URL."?role=admin&act=update-category&id=".$_GET['id']);
                exit;
            }
            $categoryModel = new CategoryModel();
            $message = $categoryModel->updateCategoryToDB();

            if ($message) {
                $_SESSION['message']="Chỉnh sửa thành công";
                header("location: ".BASE_URL."?role=admin&act=all-category");
                exit;
            }else{
                $_SESSION['message']="Chỉnh sửa không thành công";
                header("location: ".BASE_URL."?role=admin&act=update-category&id=".$_GET['id']);
                exit;   
            }
        }
    }
    public function showCategory(){
        if (!isset($_GET['id'])) {
            $_SESSION['message'] = "Vui lòng chọn category cần xem"; 
            header("Location: " . BASE_URL . "?role=admin&act=all-category");
            exit;
        }
        $categoryModel = new CategoryModel();
        $category = $categoryModel->getCategoryById();

        include 'app/Views/Admin/show-category.php';
    }


}