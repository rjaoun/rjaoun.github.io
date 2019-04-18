<?php
require_once 'database/customer_reviews_classfile/Database.php';
require_once 'database/customer_reviews_classfile/CustomerReview.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    
    $dbcon = Database::getDb();
    $r = new CustomerReview();
    $count = $r->deleteCustomerReview($id, $dbcon);
    
    if($count){
        header("Location: listcustomerreviews_admin.php");
    }
    else {
        echo " problem deleting";
    }

}

?>