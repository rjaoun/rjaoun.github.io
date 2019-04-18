<?php
class CustomerReview{

    
    public function getAllCustomerReviews($dbcon)
    {
       
        //$dbcon = Database::getDb(); 
        
        $sql = "SELECT * FROM customer_review";  

        $pdostm = $dbcon->prepare($sql); //prepare statement

        $pdostm->execute();  //execute 

        $customerreviews = $pdostm->fetchAll(PDO::FETCH_OBJ);


        return $customerreviews;
    }
    
    //Add customerReview
    public function addCustomerReview($client_id, $customer_name, $service_id, $rating, $comment, $date, $dbcon){
        $sql = "INSERT INTO customer_review (client_id, customer_name, service_id, rating, comment, date)
                VALUES(:client_id, :customer_name, :service_id, :rating, :comment, :date)";
    
    $pst = $dbcon->prepare($sql); 
    
    $pst->bindParam(':client_id', $client_id);
    $pst->bindParam(':customer_name', $customer_name);
    $pst->bindParam(':service_id', $service_id);
    $pst->bindParam(':rating', $rating);
    $pst->bindParam(':comment', $comment);
    $pst->bindParam(':date', $date);
    
    
    
    $count = $pst->execute();
    return $count;  //return 1 get answer if 0 there is error
    
    }
    
    
      
    //delete Customer Review(Admin can Delete it)
     public function deleteCustomerReview($id, $dbcon){
        $sql = "DELETE FROM customer_review WHERE id = :id";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;

    }
    
    //get customer review by review id
    public function getReviewById($id, $dbcon){
        $sql = "SELECT * FROM customer_review where id = :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }
    
}

?>