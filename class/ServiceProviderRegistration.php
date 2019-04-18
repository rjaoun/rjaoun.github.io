<?php

class ServiceProviderRegistration
{
	public function getAllServiceProviders($dbcon)
	{
		$sql = "SELECT * FROM service_providers";

		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		
		$serviceproviders = $pdostm->fetchAll(PDO::FETCH_OBJ);

		return $serviceproviders;
	}

	public function addServiceProvider($name, $phone, $email, $sub_service_id, $city, $dbcon){

		$sql = "INSERT INTO service_providers (name,phone,email, sub_service_id, city)
			VALUES (:name, :phone, :email, :service, :city) "; 
		$pst = $dbcon->prepare($sql);
		
		$pst->bindParam(':name', $name);
		$pst->bindParam(':phone', $phone);
		$pst->bindParam(':email', $email);
		$pst->bindParam(':service', $sub_service_id);
		$pst->bindParam(':city', $city);
		
		$count = $pst->execute();
		
		return $count;

	}

	public function deleteServiceProvider($id, $db){
		$sql = "DELETE FROM service_providers WHERE id = :id";
		$pst = $db->prepare($sql);
		$pst->bindParam(':id', $id);
		
		$count = $pst->execute();
		
		return $count;
	}	

    public function updateServiceProvider($id, $name, $phone, $email, $service, $city, $db){
        $sql = "Update service_providers
                set name = :name,
                phone = :phone,
                email = :email,
                service = :service,
                city = :city
                WHERE id = :id
        
        ";

        $pst =  $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':service', $service);
        $pst->bindParam(':city', $city);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();

        return $count;
    }



    public function getServiceProviderById($id, $db){
        $sql = "SELECT * FROM service_providers where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

    public function getServiceProviderBySubserviceId($id, $db){
       $sql = "SELECT * FROM service_providers  where sub_service_id = :id";

		$pdostm = $db->prepare($sql);
		$pdostm->bindParam(':id', $id);
		$pdostm->execute();
		
		$serviceproviders = $pdostm->fetchAll(PDO::FETCH_OBJ);

		return $serviceproviders;

    }

}

?>