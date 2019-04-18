<?php
//echo "Delete";
require_once 'menu/Database.php';
require_once 'class/ServiceProviderRegistration.php';

if(isset($_POST['id'])){
	$id= $_POST['id'];
	$db = Database::getDb();
	
	$s = new ServiceProviderRegistration();
	$count = $s->deleteServiceProvider($id, $db);
	if($count) {
		echo "Service Provider Deleted";
		header("Location: listserviceproviders.php");
	}
	else{
		echo "Problem deleting Service Provider";
	}
}

?>