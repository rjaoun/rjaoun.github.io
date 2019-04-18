
<!--Edit Job Position Admin Side -->
<?php


echo " <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";
    
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";

echo "<!-- Font Awesome -->
     <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>";
     //Margi - Custom files
echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>";
echo "<link rel='stylesheet' href='styles/editjobposition_admin.css'>";

?>


<!-- header -->
<?php require_once 'body/header.php' ?>

<!-- main -->
<main id="editjobposition_admin_main">
 <div class="container">
    <h1>Edit Job Post</h1>


<?php

    require_once 'database/career/DatabaseEmployeesCareer.php';
    require_once 'database/career/JobPosition_admin.php';

    $job_title = $location_name = $skill_requirements = $job_requirements = $description = $salary = $job_type = "";


    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $dbcon = DatabaseEmployeesCareer::getDb();

        $sql = "SELECT * FROM job_post_admin_side where id = :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();

        $position = $pst->fetch(PDO::FETCH_OBJ);

        $job_title =  $position->job_title;
        $location_name = $position->location_name;
        $skill_requirements = $position->skill_requirements;
        $job_requirements = $position->job_requirements;
        $description = $position->description;
        $salary = $position->salary;
        $job_type = $position->job_type;


    }
    if(isset($_POST['editjobposition']))
    {
        $id = $_POST['pid'];
        $job_title = $_POST['job_title'];
        $location_name = $_POST['location_name'];
        $skill_requirements = $_POST['skill_requirements'];
        $job_requirements = $_POST['job_requirements'];
        $description = $_POST['description'];
        $salary = $_POST['salary'];
        $job_type = $_POST['job_type'];

        $dbcon = DatabaseEmployeesCareer::getDb();
        $j = new JobPosition_admin();

        $count = $j->updateJobPosition($id, $job_title, $location_name, $skill_requirements, $job_requirements, $description, $salary, $job_type, $dbcon);

        if($count){
           header('Location:  listjobpositions_admin.php');
            //echo "updated succesfully";
        } else {
            echo "problem";
        }
    }
  

?>
 
<!-- form -->
    <form action="" method="post" class="form-horizontal">

        <!-- id-->
        <div class="form-group">
            <label class="control-label col-sm-2" for="job_title"></label>
                <div class="col-sm-6">
                    <input type="hidden" name="pid" value="<?= $id; ?>" class="form-control"/>
                </div>
        </div>

        <!-- Job Title -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="job_title"> Job Title:</label>
                <div class="col-sm-6">
                    <input type="text" name="job_title" value="<?= $job_title; ?>" class="form-control"/>
            </div>
        </div>

        <!-- Location Name -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="location_name"> Location Name:</label>
                <div class="col-sm-6">
                    <input type="text" name="location_name" value="<?= $location_name; ?>" class="form-control"/>
            </div>
        </div>


        <!-- Skill Requirements -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="skill_requirements"> Skill Requirements:</label>
                <div class="col-sm-6">
                    <input type="text" name="skill_requirements" value="<?= $skill_requirements; ?>" class="form-control"/>
            </div>
        </div>


        <!-- Job Requirements-->
        <div class="form-group">
            <label class="control-label col-sm-2" for="job_requirements"> Job Requirements:</label>
               <div class="col-sm-6"> 
                   <input type="text" name="job_requirements" value="<?= $job_requirements; ?>" class="form-control"/>
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="description"> Description: </label>
                 <div class="col-sm-6"> 
                    <input type="text" name="description" value="<?= $description; ?>" class="form-control"/>
            </div>
        </div>

        <!-- Salary -->
        <div class="form-group">
             <label class="control-label col-sm-2" for="salary"> Salary:  </label>
                <div class="col-sm-6"> 
                    <input type="text" name="salary" value="<?= $salary ?>" class="form-control"/>
            </div>
        </div>

        <!-- Job Type -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="job_type"> Job Type:  </label>
                <div class="col-sm-6">
                    <input type="text" name="job_type" value="<?= $job_type ?>" class="form-control"/>
            </div>
        </div>


        <!-- Edit Button-->
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default" name="editjobposition" value="Edit Job Post">Submit</button>
            </div>
        </div>

      <!--  <input type="submit" name="editjobposition" value="Edit Job Post"> -->
    </form>
 </div>
</main>

<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
