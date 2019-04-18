<?php
class DatabaseEmployeesCareer{

private static $user='root';   // it call clas level property
private static $pass= '';  //static property is belongs to class
private static $dsn = 'mysql:host=localhost;dbname=service_u_need';//(database:host=localhost;) 
private static $dbcon;
    
private function __construct(){
    
}

    
//get PDO connection
public function getDb(){

    //if we have only one connection if not have so will create connection
    if(!isset(self::$dbcon)){
    try{
         self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass); 
    
        //$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //set attribute and show me an exception   ATTR_ERRMODE : attribute , ERRMODE_EXCEPTION : value
        
        self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        
        $msg = $e->getMessage();
        include 'customerror.php'; //database connection
        exit();
    }
        
 }
    //return $dbcon; //return the conneciton
    return self::$dbcon;
}
}
?>