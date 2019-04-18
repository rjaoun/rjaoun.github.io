
<!--List of Employees Page Admin Side (list of Employees) -->
<?php
  
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";

echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";


echo "<!-- Font Awesome -->
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>";
     
    //Margi - Custom files
echo "<link rel='stylesheet' href='styles/listemployees_admin.css'>";

echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>";

?>

<!-- header -->
<?php require_once 'body/header.php' ?>

<!-- main -->
<main id="listofemployees_admin_main">


  <h1>Employees</h1>
<!-- Html part -->
    
<div class="container">
 <div class="row">
  
<?php

    require_once 'DatabaseEmployeesCareer.php';
    require_once 'Employee_client.php';

    $dbcon = DatabaseEmployeesCareer::getDb();
    $e = new Employee_client();
    $myemp =  $e->getAllEmployees(DatabaseEmployeesCareer::getDb());


    foreach($myemp as $employee)
    {
        echo "<ul class='list-group'>" .
             "<li class='list-group-item'>" .  $employee->employee_firstname  . $employee->employee_lastname . 
             "<form action='deleteemployee_admin.php' method='post'>".
             "<input type='hidden' name = 'id' value='$employee->id' />" .
             "<input type='submit' name='delete' value='Delete Employee' class='delete-button' />" .
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
