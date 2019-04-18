<?php

require_once 'class/Appointment.php';
require_once 'database/Database.php';
require_once 'class/Menu.php';
$db = Database::getDb();
$name = $email = $phone = $service = $date = $time = $response_msg = "";

if(isset($_POST['bookapp'])){
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $postal = $_POST['postal'];
  $service = $_POST['subservice'];
  $date = $_POST['date'];
  $time = $_POST['time'];
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
  if($address == ""){
    $address_err = "Please enter address. ";
    $flag = 1;
  }
  if($city == ""){
    $city_err = "Please enter city. ";
    $flag = 1;
  }
  if($province == ""){
    $province_err = "Please enter province. ";
    $flag = 1;
  }
  if($postal == ""){
    $postal_err = "Please enter postal. ";
    $flag = 1;
  }
  if($service == ""){
    $service_err = "Please enter service. ";
    $flag = 1;
  }
  if($date == ""){
    $date_err = "Please enter date. ";
    $flag = 1;
  }
  if($time == ""){
    $time_err = "Please enter time. ";
    $flag = 1;
  }

  /*$name_err = validate($name);
  $email_err = validate($email);
  $phone_err = validate($phone);
  $service_err = validate($service);
  $date_err = validate($date);
  $time_err = validate($time);*/

  $a = new Appointment();
  if($flag == 0){
    $c = $a->addAppointment($name,$email,$phone,$service,$date,$time,$db);
    if($c){
      $response_msg = "Apppointment booked successfully";
    }else{
      $response_msg = "Error in booking appointment";
    }
  }
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Book an appointment</title>
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
  <link rel='stylesheet' type='text/css' href='styles/bookanappointment.css'>
</head>

<body>
<!-- header.php -->

	<?php require_once 'body/header.php' ?>

<main>
	<div class="container">
  <h2>Book an appointment</h2>
  
  
  <div class="view overlay z-depth-1-half">
    <img src="images/bookappointment_banner.jpg" alt="banner_bookAnAppointment" class="card-img-top img-fluid">
    <div class="mask rgba-white-light"></div>
  </div>
   

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
      <label class="control-label col-sm-2" for="address">Address</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php
                                if(isset($address)){
                                    echo $address;
                                }
                          ?>" >
        <span style="color:red;">
                <?php
                    if(isset($address_err)){
                        echo $address_err;
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
      <label class="control-label col-sm-2" for="province">Province</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="province" placeholder="Enter province" name="province" value="<?php
                                if(isset($province)){
                                    echo $province;
                                }
                          ?>" >
        <span style="color:red;">
                <?php
                    if(isset($province_err)){
                        echo $province_err;
                    }
                    ?>
        </span>
      </div>             
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="postal">Postal</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="postal" placeholder="Enter postal" name="postal" value="<?php
                                if(isset($postal)){
                                    echo $postal;
                                }
                          ?>" >
        <span style="color:red;">
                <?php
                    if(isset($postal_err)){
                        echo $postal_err;
                    }
                    ?>
        </span>
      </div>             
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="service">Service</label>
      <div class="col-sm-10">
        
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
      <label class="control-label col-sm-2" for="serviceprovider">Service Provider</label>
      <div class="col-sm-10">
        <select name="serviceprovider" id="serviceprovider">


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
      <label class="control-label col-sm-2" for="date">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="date" name="date" value="<?php
                                if(isset($date)){
                                    echo $date;
                                }
                          ?>" >
        <span style="color:red;">
              <?php
                if(isset($date_err)){
                  echo $date_err;
                }
              ?>
        </span>
      </div>
          
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="time">Time</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" id="time" name="time" value="<?php
                                if(isset($time)){
                                    echo $time;
                                }
                          ?>" >
        <span style="color:red;">
              <?php
                if(isset($time_err)){
                  echo $time_err;
                }
              ?>
        </span>
      </div>
          
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="bookapp" class="btn btn-default">Book an apoointment</button>
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
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="bootstrap/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="bootstrap/js/mdb.js"></script>
  <script type="text/javascript" src="script/service.js"></script>
</body>
</html>


<!--<form action="" method="post">
    <input type="hidden" name="aid" value="<?= $id; ?>" />
    Name: <input type="text" name="name" value="<?= $name; ?>" /><br/>
    Email: <input type="text" name="email" value="<?= $email; ?>"/><br />
    Phone: <input type="text" name="phone" value="<?= $phone; ?>"/><br />
    Service: <input type="text" name="service" value="<?= $service; ?>"/><br />
    Date: <input type="date" name="date" value="<?= $date; ?>"/><br />
    Time: <input type="time" name="time" value="<?= $time; ?>"/><br />
    <input type="submit" name="updateappointment" value="Update Appointment">
</form>-->