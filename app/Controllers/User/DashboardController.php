<?php
class DashboardController{
    public function dashBoard(){
        $categoryModel = new CategoryUserModel();
        $listCategory = $categoryModel->getCategoryDashboard();

        $productModel = new ProductUserModel();
        $listProduct = $productModel->getProductDashboard();
        include 'app/Views/User/index.php';
    }
    public function myAccount(){
        include 'app/Views/User/myaccount.php';
    }
    public function accountDetail(){
        $userModel = new UserModel2();
        $user = $userModel -> getCurrentUser();
        include 'app/Views/User/account-detail.php';

    }
    public function accountUpdate(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->changePassword();
            
            $userModel = new UserModel2();
            $user = $userModel->getCurrentUser();
                //Theem anhr
                $uploadDir = 'assets/Admin/upload/';
                $allowedTypes = ['image/jpeg','image/png','image/gif'];
                $destPath = $user -> image;
                if(!empty($_FILES['image']['name'])){
                    $fileTmpPath = $_FILES['image']['tmp_name'];
                    $fileType = mime_content_type($fileTmpPath);
                    $filename = basename($_FILES['image']['name']);
                    $fileExtension = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        
                    $newFileName = uniqid().'.'.$fileExtension;
                    if(in_array($fileType, $allowedTypes)){
                        $destPath = $uploadDir. $newFileName;
                        if (!move_uploaded_file($fileTmpPath, $destPath)){
                            $destPath = "";
                        }
                        //xóa ảnh cũ
                        unlink($user -> image);
                    }
                }   
        
        
                $userModel = new UserModel2();
                $message= $userModel->updateCurrentUser($destPath);
        
                if ($message) {
                    $_SESSION['message']="Chỉnh sửa thành công";
                    header("location: ".BASE_URL."?act=account-detail");
                    exit;
                }else{
                    $_SESSION['message']="Chỉnh sửa không thành công";
                    header("location: ".BASE_URL."?act=account-detail");
                    exit;   
                }
            }
        }
        public function changePassword(){
            if(
                $_POST['current-password'] != "" && 
                $_POST['new-password'] != "" && 
                $_POST['confirm-password'] != "" &&
                $_POST['new-password'] == $_POST['confirm-password']
    
            ){
                $userModel = new UserModel2();
                $userModel -> changePassword();
            }
        }
        public function showShop() {
            $productModel = new ProductUserModel();
            $listProduct = $productModel->getDataShop();
            
            $category = null; // Khởi tạo mặc định
            $categoryModel= new CategoryUserModel();
            if (isset($_GET['category_id'])) {
                $categoryId = intval($_GET['category_id']); 
                $category =$categoryModel ->getCategoryById($categoryId);
            }
            $listCategory= $categoryModel->getCategoryDashboard();
            $stock = $productModel->getProductStock();

            if(isset($_GET['instock'])){
                $listProduct = array_filter($listProduct, function ($product){
                    return $product -> stock > 0;             
                   });
            }
            if(isset($_GET['outstock'])){
                $listProduct = array_filter($listProduct, function ($product){
                    return $product -> stock == 0;             
                   });
            }
            if(isset($_GET['min'])){
                $listProduct = array_filter($listProduct, function ($product){
                    if($product->price_sale != null){
                        return $product -> price_sale > $_GET['min'];   
                    
                    }
                    return $product -> price > $_GET['min'];             
                   });
            }
            if(isset($_GET['max'])){
                $listProduct = array_filter($listProduct, function ($product){
                    if($product->price_sale != null){
                        return $product ->price < $_GET['max'];     
                    
                    }
                    return $product ->price < $_GET['max'];             
                   });
            }
            if(isset($_GET['product-name'])){
                $listProduct = $productModel->getDataShopName();
            }


            include 'app/Views/User/shop.php';
        }
        public function productDetail(){
            $productModel = new ProductUserModel();
            $product = $productModel->getProductById();

            $productImage=$productModel->getProductImageById();
            $otherProduct = $productModel->getOtherProduct($product->category_id, $product->id);

            $comment = $productModel->getComment($product->id);
            foreach($comment as $key =>$value){
                $rating = $productModel->getCommentByUser($product->id, $value->user_id);
                if($rating){
                    $comment[$key]->rating = $rating->rating;
                }else{
                    $comment[$key]->rating = null;
                }
                
            }
            $ratingProduct = $productModel->getRating($product->id);
            include 'app/Views/User/product-detail.php';
        }
        public function writeReview(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
              $productModel = new ProductUserModel();
                $productModel->saveRating();
                $productModel->saveComment();
               header("Location: ".BASE_URL."?act=product-detail&product_id=".$_POST['productId']);

            }
        }
        
    }
    

