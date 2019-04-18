<?php
class FAQ
{ 
	public function addFAQ($question,$answer,$db)
	{

		
        $db = Database::getdb();
		$sql = "INSERT INTO faqs (questions,answers) VALUES (:questions,:answers)";
		$pst = $db->prepare($sql);
		$pst->bindParam(':questions',$question);
		$pst->bindParam(':answers',$answer);
		$count = $pst->execute();
		return $count;
	}
	public function getAllFAQs($db){
      
      $sql = "SELECT * FROM faqs";

      $pst = $db->prepare($sql);
      $pst->execute();

      $FAQs = $pst->fetchAll(PDO::FETCH_OBJ);


      return $FAQs;
    }

    public function deleteFAQ($id,$db)
    {

     $sql = "DELETE FROM faqs WHERE id = :id";
     $pst = $db->prepare($sql);
     $pst->bindParam (':id',$id);
     $count = $pst->execute();

     return $count;

    }
    public function getFAQById($id, $db){
        $sql = "SELECT * FROM faqs where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(PDO::FETCH_OBJ);
    } 
    public function updateFAQ($id,$question,$answer, $db)
    {
    
        $sql = "UPDATE faqs
               set questions= :question,
                   answers = :answer
                   WHERE id = :id ";

        $pst = $db->prepare($sql);
        
        $pst->bindParam(':question',$question);
        $pst->bindParam(':answer',$answer);
        $pst->bindParam(':id',$id);
        $updatefaq = $pst->execute();

        return $updatefaq;

     }
}