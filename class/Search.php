<?php

class Search{
    
    //Search By Services, SubServices and Service Providers Name
    public function searchByName($dbcon, $search_query) {
        
        $search_query_like = "%".strtolower($search_query)."%";
        
        //$sql = "SELECT name FROM services WHERE LOWER(name) LIKE '$search_query_like'";
        
        $sql = "(SELECT name FROM services WHERE LOWER(name) LIKE '$search_query_like')
                UNION
                (SELECT name FROM sub_services WHERE LOWER(name) LIKE '$search_query_like')
                UNION
                (SELECT name FROM service_providers WHERE LOWER(name) LIKE '$search_query_like')";
        
        $pdostm = $dbcon->prepare($sql); //prepare statement
        
        $pdostm->execute();  //execute 
        
        $result = $pdostm->fetchAll(PDO::FETCH_OBJ);
        
        return $result;
    }
   
}

?>