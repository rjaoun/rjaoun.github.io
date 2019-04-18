
<!--List of Jobs Positions Page Admin Side (list of jobs) -->
<?php


        
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";

echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";

echo "<!-- Font Awesome -->
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>";
     
    //Margi - Custom files
echo "<link rel='stylesheet' href='styles/listjobpositions_admin.css'>";

echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>";

?>

<!-- header -->
<?php require_once 'body/header.php' ?>

<!-- main -->
<main id="listofjobpositions_admin_main">


  <h1>Positions</h1>
<!-- Html part -->

    
 <div class="container-fluid">
   <div class="row">
       
    
<?php

    require_once 'database/career/DatabaseEmployeesCareer.php';
    require_once 'database/career/JobPosition_admin.php';

    $dbcon = DatabaseEmployeesCareer::getDb();
    $j = new JobPosition_admin();
    $myjobposition =  $j->getAllJobPositions(DatabaseEmployeesCareer::getDb());


    foreach($myjobposition as $position)
    {
        echo   "<div class='col-sm-3 col-md-4'>" . 
                "<h3>" . $position->job_title ."</h3>" . "<br>" . 
                $position->location_name .  "<br>" .
                $position->skill_requirements . "<br>". 
                $position->job_requirements . "<br>". 
                $position->description . "<br>" .
                $position->salary . "<br>". 
                $position->job_type .

                //delete Button
                "<div class='delete-job'>" .    
                    "<form action='deletejobposition_admin.php' method='post' class='form-horizontal'>".
                    "<input type='hidden' name = 'id' value='$position->id' />" .
                    "<input type='submit' name='delete' value='Delete Job Position' />" .
                    "</form>" .
                "</div>" .

                //edit Button
                "<div class='edit-job'>" .   
                    "<form action='editjobposition_admin.php' method='post' class='form-horizontal'>".
                    "<input type='hidden' name = 'id' value='$position->id' />" .
                    "<input type='submit' name='edit' value='Edit Job Position' />" .
                    "</form>" .
                "</div>" . 
                "</div>";

    }
?>
   </div>
<?php
        //add Job Postition Button
echo      "<div class='add-job'>" .    
                "<form action='addjobposition_admin.php' method='post' class='form-horizontal'>".
                "<input type='hidden' name = 'id' value='$position->id' />" .
                "<input type='submit' name='add' value='Add Job Postition' />" .
                "</form>" .
            
          "</div>"; 
?>

 </div>
</main>

<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
