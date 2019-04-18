<?php
require_once 'class/ServiceProviderRegistration.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
          if(!empty($_POST["service_id"])){
            $sb = new ServiceProviderRegistration();

            $mysubmenu = $sb->getServiceProviderBySubserviceId($_POST["service_id"],Database::getDb());
            $str="";
	    foreach($mysubmenu as $submenu) {
              $str.='<option value="'.$submenu->id.'">'.$submenu->name.'</option>';
            }
          }else{
            $str.='<option value="">Servie provider not available</option>';
          }
	  echo $str;	
?>


