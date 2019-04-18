<?php //class employee - Model

class Employee_client
{
    //to reuse this method again
    //view of list of employee 
    public function getAllEmployees($dbcon)
    {
       
        //$dbcon = Database::getDb(); 
        
        $sql = "SELECT * FROM job_apply_employee_client_side";  

        $pdostm = $dbcon->prepare($sql); //prepare statement

        $pdostm->execute();  //execute 

        $employees = $pdostm->fetchAll(PDO::FETCH_OBJ);


        return $employees;
    }
    
    
    //add Employee when Employee will submit form
    public function addEmployee($job_id, $employee_f_name, $employee_l_name, $streetname, $city, $province, $postal_code, $email_id, $phone_no, $availability, $dbcon)
    {
        $sql = "INSERT INTO job_apply_employee_client_side (job_id, employee_firstname, employee_lastname, streetname, city,                 province, postal_code, email_id, phone_no, availability )
                VALUES(:job_id, :employee_firstname, :employee_lastname, :streetname, :city, :province, :postal_code, :email_id, :phone_no, :availability)";
    
        $pst = $dbcon->prepare($sql); 

        $pst->bindParam(':job_id', $job_id);
        $pst->bindParam(':employee_firstname', $employee_f_name);
        $pst->bindParam(':employee_lastname', $employee_l_name);
        $pst->bindParam(':streetname', $streetname);
        $pst->bindParam(':city', $city);
        $pst->bindParam(':province', $province);
        $pst->bindParam(':postal_code', $postal_code);
        $pst->bindParam(':email_id', $email_id);
        $pst->bindParam(':phone_no', $phone_no);
        $pst->bindParam(':availability', $availability);


        $count = $pst->execute();
        return $count; 
    }
    
    
    //delete Employee
     public function deleteEmployee($id, $dbcon){
        $sql = "DELETE FROM job_apply_employee_client_side WHERE id = :id";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        
        $count = $pst->execute();
        return $count;

    }
    

}

?>