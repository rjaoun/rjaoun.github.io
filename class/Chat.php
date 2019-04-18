<?php

class Chat
{
	public function addVisitor($name, $email, $dbcon){

		$sql = "INSERT INTO visitors (name,email)
			VALUES (:name, :email) ";
		$pst = $dbcon->prepare($sql);
		
		$pst->bindParam(':name', $name);
		$pst->bindParam(':email', $email);
		
		$count = $pst->execute();
		
		return $count;

	}

	public function getAllVisitors($dbcon)
	{
		$sql = "SELECT * FROM visitors";

		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		
		$appointments = $pdostm->fetchAll(PDO::FETCH_OBJ);

		return $appointments;
	}

	 public function getVisitorByEmail($email, $db){
        $sql = "SELECT * FROM visitors where email = :email";
        $pst = $db->prepare($sql);
        $pst->bindParam(':email', $email);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }

	public function addMessage($visitor_id, $message, $time_stamp, $dbcon){

		$sql = "INSERT INTO chat_messages (visitor_id,message,time_stamp)
			VALUES (:visitor_id, :message, :time_stamp) ";
		$pst = $dbcon->prepare($sql);
		
		$pst->bindParam(':visitor_id', $visitor_id);
		$pst->bindParam(':message', $message);
		$pst->bindParam(':time_stamp', $time_stamp);
		
		$count = $pst->execute();
		
		return $count;

	}

	 public function getMessageByVisitorId($id, $db){
        $sql = "SELECT * FROM chat_messages where visitor_id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    }



}