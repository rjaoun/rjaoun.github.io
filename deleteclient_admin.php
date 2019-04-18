<?php
 require_once 'database/Database.php';
 require_once 'database/clientregistration/Client.php';

//delete client by clientid
if(isset($_POST['id']))
  {   
  	
  $id = $_POST['id'];
  $db = Database:: getdb();
  $c = new Client();

  $count = $c->deleteClient($id,$db);

   if($count){
    	header("Location: listclients_admin.php");;//go to the list of client page.
    }
    else{
    	echo"problem";
    }
  }

  ?>