<!-- Customer Reviewed Interface Page (Customer_Review Interface:After given reviewed for Customer)-->
<?php
echo " <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";
    
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";

echo "<!-- Font Awesome -->
          <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>";

 //Margi - Custom files
echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>
        <link rel='stylesheet' type='text/css' href='styles/customer_reviewed_interface.css'>";

?>

<!-- header -->
<?php require_once 'body/header.php' ?>

<!-- main -->
<main id="customer_review_interface_main">
<div class="container">
  <h1>Customer Reviews</h1>
      <div class="container-fluid">
        <div id="block">
          <div><label>Customer Name</label></div>

          <div>
            <label >Rating</label>
          </div>

          <div>
            <label >Service Provider</label>
          </div>

          <div>
          <p >Review</p>
          </div>

          <div> 
          <label>Date</label>

          </div>
        </div>
    </div>
</div>
</main>

<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>