<!-- Admin can delete Customer Reviews -->

<?php


        
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";

echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";

echo "<!-- Font Awesome -->
          <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>";
     
    //Margi - Custom files
echo "<link rel='stylesheet' href='styles/listcustomerreviews_admin.css'>";

echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>";

?>

<!-- header -->
<?php require_once 'body/header.php' ?>

<!-- main -->
<main id="listcustomerreviews_admin_main">


  <h1>Customer Reviews</h1>
<!-- Html part -->

    
<div class="container-fluid">
    
    <div class="row">
       
<?php
require_once 'database/customer_reviews_classfile/Database.php';
require_once 'database/customer_reviews_classfile/CustomerReview.php';

$dbcon = Database::getDb();
$r = new CustomerReview();
$myreview =  $r->getAllCustomerReviews(Database::getDb());


foreach($myreview as $review){
    echo "<div class='col-sm-3 col-md-4'>" .
        "Customer Name: " . $review->customer_name  . "<br>" .
        "Rating: " . $review->rating .  "<br>" . 
        "Comment: " . $review->comment . "<br>" .
        "Date: " . $review->date . "<br>" .
        "<form action='deletecustomer_review_admin.php' method='post' class='form-horizontal'>".
        "<input type='hidden' name = 'id' value='$review->id' />" .
        "<input type='submit' name='delete' value='Delete Customer Review' />" .
        "</form>" .
        "</div>";
   
}

?>
        
</div>
</div>

</main>

<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
