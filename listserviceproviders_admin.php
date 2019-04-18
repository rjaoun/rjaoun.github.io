<?php

require_once 'class/ServiceProviderRegistration.php';
require_once 'database/Database.php';

$dbcon = Database::getDb();
$s = new ServiceProviderRegistration();
$myserviceprovider = $s->getAllServiceProviders($dbcon);

foreach($myserviceprovider as $serviceprovider){
	echo "<li>" . $serviceprovider->name . 
	"<form action='deleteserviceprovider.php' method='post'>".
	"<input type='hidden' name='id' value='$serviceprovider->id'>".
	"<input type='submit' name='delete' value='Delete Service Provider' />".
	"</form>".
	"<form action='updateserviceprovider.php' method='post'>".
	"<input type='hidden' name='id' value='$serviceprovider->id'>".
	"<input type='submit' name='update' value='Update Service Provider' />".
	"</form>".
	"</li>";
}


?>