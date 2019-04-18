
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
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/career_main_page.css">

</head>

<body class="container" style="padding-left: 0px;
padding-right: 0px; margin: 0 auto; width: 1200px;">
<!-- header.php -->

<!-- header -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/header.php'); ?>


<!-- main -->
<main id="career_main">

<?php
//Database

    require_once 'database/career/DatabaseEmployeesCareer.php';
    require_once 'database/career/JobPosition_admin.php';

    $dbcon = DatabaseEmployeesCareer::getDb();
    $j = new JobPosition_admin();
    $myjobposition =  $j->getAllJobPositions(DatabaseEmployeesCareer::getDb());

?>
<!-- Html part -->
<h1>Open Positions</h1>
    
    
<div class="container-fluid">
  <h2>Apply For A Job</h2>
  <p> we're looking for hard-working, passionate people to help us create the next million jobs in Canada.</p>
    <h3>Positions</h3>
    <div class="row">
<?php 
    foreach($myjobposition as $position)
    {
        echo "<div class='col-sm-3 col-md-4'>" . 
                    "<h3>" . "Job Title: " .  $position->job_title . "</h3>" . "<br>".
                        "Location Name: " . $position->location_name . "<br>".
                        "Skill Requirements: " .  $position->skill_requirements . "<br>".
                        "Job Requirements: " .  $position->job_requirements . "<br>" .
                        "Description: " .  $position->description . "<br>" .    
                        "Salary: " .  $position->salary . "<br>" .
                        "Job Type: " .  $position->job_type .
            
            //apply for a job       
            "<div class='apply-job'>" .    
                    "<form action='addemployee_client_index.php' method='post' class='form-horizontal'>".
                    "<input type='hidden' name = 'id' value='$position->id' />" .
                    "<input type='submit' name='apply' value='Apply for a Job' />" .
                    "</form>" .
            "</div>" .
            "</div>";
    }

?>
    </div>
</div>
</main>

<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>