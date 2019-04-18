<?php

    require_once 'database/career/DatabaseEmployeesCareer.php';
    require_once 'database/career/JobPosition_admin.php';

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $dbcon = DatabaseEmployeesCareer::getDb();
        $j = new JobPosition_admin();
        $count = $j->deleteJobPosition($id, $dbcon);

        if($count){
            header("Location: listjobpositions_admin.php");
        }
        else {
            echo " problem deleting";
        }


    }

?>

