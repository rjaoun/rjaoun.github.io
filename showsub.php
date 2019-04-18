<?php
require_once 'class/Menu.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
          if(!empty($_POST["service_id"])){
            $sb = new Submenu();

            $mysubmenu = $sb->getAllSubMenus(Database::getDb(),$_POST["service_id"]);
            $str="";
	    foreach($mysubmenu as $submenu) {
              $str.='<option value="'.$submenu->id.'">'.$submenu->name.'</option>';
            }
          }else{
            $str.='<option value="">Subservice not available</option>';
          }
	  echo $str;	
          ?>
