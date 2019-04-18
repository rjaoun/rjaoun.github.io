<?php

require_once 'class/ServiceProviderRegistration.php';
require_once 'database/Database.php';
//get sub_service_id from submenu link
$id = 4;
$dbcon = Database::getDb();
$s = new ServiceProviderRegistration();
$myserviceprovider = $s->getServiceProviderBySubserviceId($id,$dbcon);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Service Providers</title>
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

<div class="container-fluid">
  <h2>Book an appointment for Service provider</h2>
  <p> </p>
    <h3>Service Providers</h3>
    <div class="row">


		<?php
		foreach($myserviceprovider as $serviceprovider)
		{
			
			echo "<div class='col-sm-3 col-md-4'>" . 
		                    "<h3>" . "Service Provider: " .  $serviceprovider->name . "</h3>" . "<br>".
		                        "Email: " . $serviceprovider->email . "<br>".
		                        "Phone: " .  $serviceprovider->phone . "<br>".
		                        "City: " .  $serviceprovider->city . "<br>" .
		            
		            //apply for a job       
		            "<div class='apply-job'>" .    
		                    "<form action='bookanappointment.php' method='post' class='form-horizontal'>".
		                    "<input type='hidden' name = 'id' value='$serviceprovider->id' />" .
		                    "<input type='submit' name='book' value='Book An Appointment' />" .
		                    "</form>" .
		            "</div>" .
		            "</div>";

		}


		?>
	</div>
</div>

</main>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/footer.php'); ?>

</body>
</html>