<?php

class Menu{

  public function getAllMenus($dbcon){
		$sql = "SELECT * FROM services";
		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		$menus = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $menus;    
  }



}
class Submenu{

	public function getAllSubMenus($dbcon, $id){
		$sql = "SELECT * FROM sub_services
						where service_id = :id";
		$pdostm = $dbcon->prepare($sql);
		$pdostm->bindParam(":id", $id);
		$pdostm->execute();
		
		$submenus = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $submenus; 		

	}
}

?>

