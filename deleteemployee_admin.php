<?php
    require_once 'database/career/DatabaseEmployeesCareer.php';
    require_once 'database/career/Employee_client.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $dbcon = DatabaseEmployeesCareer::getDb();
        $e = new Employee_client();
        $count = $e->deleteEmployee($id, $dbcon);

        if($count){
            header("Location: listemployees_admin.php");
        }
        else {
            echo " problem deleting";
        }


    }

?>


