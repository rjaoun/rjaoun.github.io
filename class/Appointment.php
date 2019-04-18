<?php

class Appointment
{
	public function getAllAppointments($dbcon)
	{
		$sql = "SELECT * FROM book_an_appointments";

		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		
		$appointments = $pdostm->fetchAll(PDO::FETCH_OBJ);

		return $appointments;
	}

	public function addAppointment($name, $email, $phone, $address, $city, $province, $postal, $service_provider, $date, $time, $dbcon){

		$sql = "INSERT INTO book_an_appointments (name,email,phone, address, city, province, postal, service_provider_id, appointment_date, appointment_time)
			VALUES (:name, :email, :phone, :address, :city, :province, :postal, :service_provider, :a_date, :a_time) ";
		$pst = $dbcon->prepare($sql);
		
		$pst->bindParam(':name', $name);//name of the placeholder,actual value
		$pst->bindParam(':email', $email);
		$pst->bindParam(':phone', $phone);
        $pst->bindParam(':address', $address);
        $pst->bindParam(':city', $city);
        $pst->bindParam(':province', $province);
        $pst->bindParam(':postal', $postal);
		$pst->bindParam(':service_provider', $service_provider);
		$pst->bindParam(':a_date', $date);
		$pst->bindParam(':a_time', $time);
		
		$count = $pst->execute();
		
		return $count;

	}

	public function deleteAppointment($id, $db){
		$sql = "DELETE FROM book_an_appointments WHERE id = :id";
		$pst = $db->prepare($sql);
		$pst->bindParam(':id', $id);
		
		$count = $pst->execute();
		
		return $count;
	}
	

    public function updateAppointment($id, $name, $email, $phone, $address, $city, $province, $postal, $service_provider, $date, $time, $db){
        $sql = "Update book_an_appointments
                set name = :name,
                email = :email,
                phone = :phone,
                address = :address,
                city = :city,
                province = :province,
                postal = :postal,
                service_provider_id = :service_provider,
                appointment_date = :a_date,
                appointment_time = :a_time
                WHERE id = :id
        
         ";

        $pst =  $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':address', $address);
        $pst->bindParam(':city', $city);
        $pst->bindParam(':province', $province);
        $pst->bindParam(':postal', $postal);
        $pst->bindParam(':service_provider', $service_provider);
        $pst->bindParam(':a_date', $date);
        $pst->bindParam(':a_time', $time);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();

        return $count;
    }



    public function getAppointmentById($id, $db){
        $sql = "SELECT * FROM book_an_appointments where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

}

?>