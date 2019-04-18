
<!--Add Job Position Admin Side -->
<?php


echo " <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>";
    
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>";

echo "<!-- Font Awesome -->
          <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>";
     //Margi - Custom files
echo "<link rel='stylesheet' type='text/css' href='styles/style.css'>";
echo "<link rel='stylesheet' href='styles/addjobposition_admin.css'>";

?>


<!-- header -->
<?php require_once 'body/header.php' ?>

<!-- main -->
<main id="addjobposition_admin_main">
 <div class="container">
    <h1>Add Job Post</h1>

    
   <div class="container">

<?php
    require_once 'database/career/DatabaseEmployeesCareer.php';
    require_once 'database/career/JobPosition_admin.php';

    $job_title = $location_name =  $skill_requirements = $job_requirements = $description = $salary = $job_type = "";

    if(isset($_POST['addpost']))
    {
           $job_title = $_POST['job_title'];
           $location_name = $_POST['location_name'];
           $skill_requirements = $_POST['skill_requirements']; 
           $job_requirements = $_POST['job_requirements'];
           $description = $_POST['description'];
           $salary = $_POST['salary'];
           $job_type = $_POST['job_type'];


        //VALIDATION
            function validate($value)
            {
                if($value == "")
                {
                    return "Please enter value"; 
                }
                else
                {
                    return "";
                }
            }

            //Job Title
            $job_title_err = validate($job_title);    

            //Location Name
            $location_name_err = validate($location_name);    

            //Skill Requirements
            $skill_requirements_err = validate($skill_requirements);    

            //Job Requirements
            $job_requirements_err = validate($job_requirements);    

            //Description
            $description_err = validate($description);    

            //Salary
            $salary_err = validate($salary);    

            //Job Type
            $job_type_err = validate($job_type);   

            //Response Message
            if(!empty($_POST['job_title']) && !empty($_POST['location_name']) && !empty($_POST['skill_requirements']) && !empty($_POST['job_requirements']) && !empty($_POST['description']) && !empty($_POST['salary']) && !empty($_POST['job_type']))
            {

               $dbcon = DatabaseEmployeesCareer::getDb();
               $j = new JobPosition_admin();
               $c = $j->addJobPosition($job_title, $location_name, $skill_requirements, $job_requirements, $description, $salary, $job_type, $dbcon);

               if($c)
               {
                   header('Location:  listjobpositions_admin.php');
                   echo "Job Post Added Successfully";
               } 
               else 
               {
                   echo "problem adding a employee";
               }
                
            }
            else
            {
                echo "Please Fill All Required Fields";

            }

    }
?>
    
<!-- form -->

    <form action="" method="post" class="form-horizontal">

        <!-- Job Title -->
         <div class="form-group">
          <label class="control-label col-sm-2" for="job_title"> Job Title:</label>
             <div class="col-sm-6">
                 <input type="text" name="job_title" value="<?php
                                        if(isset($job_title)){
                                            echo $job_title;
                                        }
                                  ?>"  class="form-control"/>
             </div>     
                    <span style="color:red;">
                    <?php
                        if(isset($job_title_err)){
                            echo $job_title_err;
                        }
                        ?>
                    </span>
        </div>


        <!-- Location Name -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="location_name"> Location Name:</label>
                <div class="col-sm-6">
                    <input type="text" name="location_name" value="<?php
                                    if(isset($location_name)){
                                        echo $location_name;
                                    }
                              ?>" class="form-control"/>
               </div>
                <span style="color:red;">
                <?php
                    if(isset($location_name_err)){
                        echo $location_name_err;
                    }
                    ?>
                </span>
        </div>


        <!-- Skill Requirements -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="skill_requirements"> Skill Requirements:</label>
                <div class="col-sm-6">
                     <input type="text" name="skill_requirements" value="<?php
                                            if(isset($skill_requirements)){
                                                echo $skill_requirements;
                                            }
                                      ?>" class="form-control"/>
                </div>        
                <span style="color:red;">
                <?php
                    if(isset($skill_requirements_err)){
                        echo $skill_requirements_err;
                    }
                    ?>
                </span>
        </div>


        <!-- Job Requirements -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="job_requirements"> Job Requirements:</label>
               <div class="col-sm-6"> 
                     <input type="text" name="job_requirements" value="<?php
                                            if(isset($job_requirements)){
                                                echo $job_requirements;
                                            }
                                      ?>" class="form-control"/>
            </div>   
                <span style="color:red;">
                <?php
                    if(isset($job_requirements_err)){
                        echo $job_requirements_err;
                    }
                    ?>
                </span>
        </div>


        <!-- Description -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="description"> Description: </label>
                 <div class="col-sm-6"> 
                    <input type="text" name="description" value="<?php
                                            if(isset($description)){
                                                echo $description;
                                            }
                                      ?>" class="form-control"/>
                </div>
                <span style="color:red;">
                <?php
                    if(isset($description_err)){
                        echo $description_err;
                    }
                    ?>
                </span>
        </div>


        <!-- Salary -->
        <div class="form-group">
             <label class="control-label col-sm-2" for="salary"> Salary:  </label>
                <div class="col-sm-6"> 
                    <input type="text" name="salary" value="<?php
                                            if(isset($salary)){
                                                echo $salary;
                                            }
                                      ?>" class="form-control"/>
                </div>
                <span style="color:red;">
                <?php
                    if(isset($salary_err)){
                        echo $salary_err;
                    }
                    ?>
                </span>
        </div>


        <!-- Job Type -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="job_type"> Job Type:  </label>
                <div class="col-sm-6">
                     <input type="text" name="job_type" value="<?php
                                            if(isset($job_type)){
                                                echo $job_type;
                                            }
                                      ?>" class="form-control"/>
                </div>
                <span style="color:red;">
                <?php
                    if(isset($job_type_err)){
                        echo $job_type_err;
                    }
                    ?>
                </span>
        </div>


        <!-- Add Job Post Button -->
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="addpost" value="Submit">Submit</button>
          </div>
        </div>

    </form>
   </div>
  </div>
</main>

<!-- footer -->
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
