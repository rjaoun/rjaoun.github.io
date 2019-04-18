
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/register.css">
  <script src="javascript/script.js"></script>
</head>

<body class="container" style="padding-left: 0px;
padding-right: 0px; margin: 0 auto; width: 1200px;">
<!-- header.php -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/header.php'); ?>
<?php 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login1.php");
    exit;
}
?>
<!-- main -->
<main id="customer_review_main">
<div class="container">
  <h1>Customer Reviews</h1>
  <h2><?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
    
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/customer_reviews_classfile/CustomerReview.php');



if(isset($_POST['addreview'])){
       $client_id = $_POST['client_id'];
       $customer_name = $_POST['customer_name'];
       $service_id = $_POST['service_id'];
       $rating = $_POST['rating'];
       $comment	= $_POST['comment'];
       $date = $_POST['date'];
       
      if(!empty($_POST['customer_name']) && !empty($_POST['rating']))
        {
           $dbcon = Database::getDb();
           $r = new CustomerReview();
           $c = $r->addCustomerReview($client_id, $customer_name, $service_id, $rating, $comment, $date, $dbcon);

           if($c){
              // header('Location:  listcustomerreviews.php');
               echo "<h4>" . "Thank You " . $customer_name  . " for your Feedback! Your Feedback is imporatant for us."  . "</h4>";

            } 
            else 
            {
               echo "problem adding a customer review";
            }
        
        } 
        else 
        {
           echo "<span style='color:red;'>" . "Please fill all required fields" . "</span>";
        }
  
        
    }

?>

    <form method="post" class="form-horizontal" action="">
        <!-- client id as a foreign key-->
        <input type="hidden" name="client_id"  /> 
      
   <!--   <div class="form-group"><label class="control-label col-sm-2" >Customer Name:</label></div> --->
        Customer Name: <input type="text" name="customer_name" /><br> 
      
        <!-- Service Provider id as a foreign key-->
        <input type="hidden" name="service_id"  /> 
        
      <div class="form-group">
          <label class="control-label col-sm-2"  for="rating" >Rating:</label>
          <div class="col-sm-offset-2 col-sm-10">
              <div class="radio">
                <label><input type="radio" name="rating" value="1 star" checked>1 star</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="rating" value="2-star"> 2 stars</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="rating" value="3-star"> 3 stars</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="rating" value="4-star"> 4 stars</label>
              </div>
              <div class="radio">
                <label><input type="radio" name="rating" value="5-star"> 5 stars</label>
              </div>
          </div>
          <br>
          <p class="para">5 stars - Excellent | 1 star - I'm not Happy!</p>
      </div>
      <br>
      <div class="form-group">
      <label class="control-label col-sm-2" for="service_provider">Service Provider:</label>
      <div class="col-sm-offset-2 col-sm-10">
      <select name="service_provider">
          <option value="John">John</option>
          <option value="Riaan">Riaan</option>
          <option value="Rogers">Rogers</option>
          <option value="Jay">Jay</option>
      </select>
          </div>
      </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2" for="comment">Write A Review:</label>
      <div class="col-sm-4">
          <textarea class="form-control" rows="5" name="comment"></textarea>
      </div>
      
    </div>
    
      <div class="form-group"> 
      <label class="control-label col-sm-2" for="date">Date:</label>
        <div class="col-sm-4">
            <input type="date" name="date" class="form-control" ><!-- TO SET VALUE value="2019-03-11" min="2018-01-01" max="2018-12-31"-->
         </div>    
      </div>
      
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="addreview" class="btn btn-default">Submit</button>
      </div>
      </div>
      
  </form>
    
</div>

</main>


<!-- footer.php -->

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/footer.php'); ?>

</body>
</html>