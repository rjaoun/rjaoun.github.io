<?php

class JobPosition_admin
{
    public function getAllJobPositions($dbcon)
    {
       
        //$dbcon = Database::getDb(); 
        
        $sql = "SELECT * FROM job_post_admin_side";  

        $pdostm = $dbcon->prepare($sql); //prepare statement

        $pdostm->execute();  //execute 

        $jobpositions = $pdostm->fetchAll(PDO::FETCH_OBJ);


        return $jobpositions;
    }
    
    
    //add Job Post
    public function addJobPosition($job_title, $location_name, $skill_requirements, $job_requirements, $description, $salary, $job_type,  $dbcon){
        $sql = "INSERT INTO job_post_admin_side (job_title, location_name, skill_requirements, job_requirements, description, salary, job_type)
            VALUES(:job_title, :location_name, :skill_requirements, :job_requirements, :description, :salary, :job_type)";
    
        $pst = $dbcon->prepare($sql); 

        $pst->bindParam(':job_title', $job_title);
        $pst->bindParam(':location_name', $location_name);
        $pst->bindParam('skill_requirements', $skill_requirements);    
        $pst->bindParam('job_requirements', $job_requirements);      
        $pst->bindParam(':description', $description);
        $pst->bindParam(':salary', $salary);
        $pst->bindParam(':job_type', $job_type);


        $count = $pst->execute();
        return $count; 

    }
   
    
    //delete Job Post
     public function deleteJobPosition($id, $dbcon){
        $sql = "DELETE FROM job_post_admin_side WHERE id = :id";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        
        $count = $pst->execute();
        return $count;

    }
    
    //edit job post
    public function updateJobPosition($id, $job_title, $location_name, $skill_requirements, $job_requirements, $description, $salary, $job_type, $dbcon){
        $sql = "Update job_post_admin_side
                set job_title = :job_title,
                    location_name = :location_name,
                    skill_requirements = :skill_requirements,
                    job_requirements = :job_requirements,
                    description = :description,
                    salary = :salary,
                    job_type = :job_type
                     
                    WHERE id = :id
        
                ";

        $pst =  $dbcon->prepare($sql);

        $pst->bindParam(':job_title', $job_title);
        $pst->bindParam(':location_name', $location_name);
        $pst->bindParam('skill_requirements', $skill_requirements);    
        $pst->bindParam('job_requirements', $job_requirements);      
        $pst->bindParam(':description', $description);
        $pst->bindParam(':salary', $salary);
        $pst->bindParam(':job_type', $job_type);
        
        
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }
}
?>


