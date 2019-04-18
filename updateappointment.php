<?php
require_once 'menu/Database.php';
require_once  'class/Appointment.php';

$name = $email = $program = $service = $date = $time = "";

if(isset($_POST['id'])){
    $id= $_POST['id'];
    $db = Database::getDb();

    $s = new Appointment();
    $appointment = $s->getAppointmentById($id, $db);

    $name =  $appointment->name;
    $email = $appointment->email;
    $phone = $appointment->phone;
    $service = $appointment->service;
    $date = $appointment->appointment_date;
    $time = $appointment->appointment_time;


}
if(isset($_POST['updateappointment'])){
    $id= $_POST['aid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $db = Database::getDb();
    $a = new Appointment();
    $count = $a->updateAppointment($id, $name, $email, $phone, $service, $date, $time, $db);

    if($count){
       header('Location:  listappointments.php');
    } else {
        echo "problem";
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
    <input type="hidden" name="aid" value="<?= $id; ?>" />
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $name; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $email; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="phone">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?= $phone; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="service">Service</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="service" placeholder="Enter Service" name="service" value="<?= $service; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="date">Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="date" name="date" value="<?= $date; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="time">Time</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" id="time" name="time" value="<?= $time; ?>">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="updateappointment" class="btn btn-default">Update an apoointment</button>
      </div>
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
</body>
</html>