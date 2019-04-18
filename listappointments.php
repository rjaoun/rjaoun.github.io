<?php

require_once 'class/Appointment.php';
require_once 'database/Database.php';

$dbcon = Database::getDb();
$s = new Appointment();
$myappointment = $s->getAllAppointments($dbcon);

foreach($myappointment as $appointment){
	echo "<li>" . $appointment->name . 
	"<form action='database/bookanappointment/deleteappointment.php' method='post'>".
	"<input type='hidden' name='id' value='$appointment->id'>".
	"<input type='submit' name='delete' value='Delete Appointment' />".
	"</form>".
	"<form action='database/bookanappointment/updateappointment.php' method='post'>".
	"<input type='hidden' name='id' value='$appointment->id'>".
	"<input type='submit' name='update' value='Update Appointment' />".
	"</form>".
	"</li>";
}


?>