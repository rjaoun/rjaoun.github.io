<!DOCTYPE html>
<html>
<head>
  <title>List Clients</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Your custom styles (optional) -->
  <link rel='stylesheet' type='text/css' href='styles/style.css'> 
  <link rel='stylesheet' href='styles/listclientsubscriber.css'> 
  <link rel='stylesheet' href='styles/faqstyle.css'>
</head>
<body>
<!-- header -->
<?php require_once 'body/header.php' ?>
<main id="listofclients_adminside">
   <h1>Registerd Clients</h1>  
   <div class="container">
     <div class="row">
       <?php
          require_once 'database/Database.php';
          require_once 'database/clientregistration/Client.php';
          
          $db = Database::getdb();
          $c = new Client();
          $myclient =  $c->getAllClients($db);

                foreach($myclient as $client)
                  {
                   echo "<ul class='list-group'>" .
                    "<li class='list-group-item'>" .  $client->client_firstname  . $client->client_lastname . 
                   "<form action='deleteclient_admin.php' method='post'>".
                  "<input type='hidden' name = 'id' value='$client->id' />" .
                   "<input type='submit' name='delete' value='Delete client' class='delete-button' />" .
                    "</form>" .
                   "</li>" .
                  "</ul>";
                 }
       ?>  
     
    </div>
  </div>
</main>
<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
</body>
</html>