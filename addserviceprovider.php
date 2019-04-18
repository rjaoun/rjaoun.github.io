<?php

require_once 'class/ServiceProviderRegistration.php';
require_once 'class/Menu.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');

$db = Database::getDb();
$name = $email = $phone = $service = $date = $time = $response_msg = "";
$s = new Menu();
$ser = $s->getAllMenus($db);


if(isset($_POST['bookapp'])){
  
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $service = $_POST['service'];
  $subservice = $_POST['subservice'];
  $city = $_POST['city'];
  $flag = 0;

  //VALIDATION
      function validate($value, $pattern = "")
        {
            if($value == "")
                {
                    $flag = 1;
                    return "Please enter value";
                }
            elseif(!preg_match($pattern, $value))
                {
                    $flag = 1;
                    return "Please enter value properly";
                }
            else
                {
                    return "";
                }
        }


  if($name == ""){
    $name_err = "Please enter name. ";
    $flag = 1;
  }
  if($email == ""){
    $email_err = "Please enter email. ";
    $flag = 1;
  }
  if($phone == ""){
    $phone_err = "Please enter phone. ";
    $flag = 1;
  }
  if($service == ""){
    $service_err = "Please enter service. ";
    $flag = 1;
  }
  if($city == ""){
    $city_err = "Please enter city. ";
    $flag = 1;
  }

  /*$name_err = validate($name);
  $email_err = validate($email);
  $phone_err = validate($phone);
  $service_err = validate($service);
  $date_err = validate($date);
  $time_err = validate($time);*/

  $a = new ServiceProviderRegistration();
  if($flag == 0){
    $c = $a->addServiceProvider($name,$phone,$email,$subservice,$city,$db);
    if($c){
      $response_msg = "Service Provider added successfully";
    }else{
      $response_msg = "Error in adding service provider";
    }
  }
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Service Provider Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="bootstrap/css/mdb.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Your custom styles (optional) -->
  <link rel='stylesheet' type='text/css' href='styles/style.css'>
</head>

<body>
<!-- header.php -->

	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/header.php'); ?>


<main>
	<div class="container">
  <h2>Service Provider registration</h2>
  

  <form class="form-horizontal" action="" method="post">
  	<div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php
                                if(isset($name)){
                                    echo $name;
                                }
                          ?>" >
        <span style="color:red;">
                <?php
                    if(isset($name_err)){
                        echo $name_err;
                    }
                    ?>
        </span>
      </div>             
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php
                                if(isset($email)){
                                    echo $email;
                                }
                          ?>" >
        <span style="color:red;">
              <?php
                if(isset($email_err)){
                  echo $email_err;
                }
              ?>
          </span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?php
                                if(isset($phone)){
                                    echo $phone;
                                }
                          ?>" >
        <span style="color:red;">
              <?php
                if(isset($phone_err)){
                  echo $phone_err;
                }
              ?>
        </span>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="service">Service</label>
      <div class="col-sm-10">
        <!--input type="text" class="form-control" id="service" placeholder="Enter Service" name="service" value="<"?php
                                if(isset($service)){
                                    echo $service;
                                }
                          ?>" -->
        <?php
          $b = new Menu();

          $mymenu = $b->getAllMenus(Database::getDb());

        ?>
        <select name="service" id="service">
          <?php $categories = array(); ?>
          <?php 
          echo "<option class='dropbtn' value=''>--Select service--</option>";
          foreach($mymenu as $menu)
          {
            echo "<option class='dropbtn' value= '$menu->id'>$menu->name</option>"; 
          }    
          ?>
          </select>
      
        
        <span style="color:red;">
              <?php
                if(isset($service_err)){
                  echo $service_err;
                }
              ?>
        </span>
      </div>
    </div>
<div class="form-group">
      <label class="control-label col-sm-2" for="subservice">Sub Service</label>
      <div class="col-sm-10">
        <select name="subservice" id="subservice">


        </select>
      
        
        <span style="color:red;">
              <?php
                if(isset($service_err)){
                  echo $service_err;
                }
              ?>
        </span>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="city">City</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="<?php
                                if(isset($city)){
                                    echo $city;
                                }
                          ?>" >
        <span style="color:red;">
                <?php
                    if(isset($city_err)){
                        echo $city_err;
                    }
                    ?>
        </span>
      </div>             
    </div>
    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="bookapp" class="btn btn-default">Submit</button>
      </div>
    </div>

    <div id="response">
      <?php
        echo $response_msg;
      ?>
    </div>
  </form>
</div>
</main>
<!-- footer.php -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/footer.php'); ?>

  <!-- SCRIPTS -->
  
  <!-- JQuery -->
  <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="bootstrap/js/mdb.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="javascript/script.js"></script>
  <script type="text/javascript" src="script/service.js"></script>

</body>
</html>
