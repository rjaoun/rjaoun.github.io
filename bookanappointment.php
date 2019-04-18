<?php

require_once 'class/Menu.php';


require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Appointment.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');


$db = Database::getDb();

$seriveprovider_id = "";
    if(isset($_POST['book'] )){
        $seriveprovider_id = $_POST['id'];
        echo "ServiceProviderId= " . $seriveprovider_id;
    }


$name = $email = $phone  = $date = $time = $response_msg = "";

if(isset($_POST['bookapp'])){
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $postal = $_POST['postal'];
  $service_provider_id = $_POST['service_provider_id'];
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
    $c = $a->addAppointment($name,$email,$phone,$address,$city,$province,$postal,$service_provider_id,$date,$time,$db);
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/register.css">
</head>

<body class="container" style="padding-left: 0px;
padding-right: 0px; margin: 0 auto; width: 1200px;">
<!-- header.php -->

  <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/header.php'); ?>


<!-- main.php -->

<main>
	<div class="container">
  <h2></h2>
  
  
  <div class="view overlay z-depth-1-half">
    <img src="images/bookappointment_banner.jpg" alt="banner_bookAnAppointment" class="card-img-top img-fluid">
    <div class="mask rgba-white-light"></div>
  </div>
   

  <form class="form-horizontal" action="" method="post">
    <div class="form-group">
        <input type="hidden" name="service_provider_id" value="<?= $seriveprovider_id; ?>" /> 
    </div>


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
  <script type="text/javascript" src="script/service.js"></script>


</body>
</html>
