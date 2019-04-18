<?php

class Blog{

	public function getAllBlogs($dbcon){
		$sql = "SELECT * FROM blogs";
		$pdostm = $dbcon->prepare($sql);
		$pdostm->execute();
		$blogs = $pdostm->fetchAll(PDO::FETCH_OBJ);
		return $blogs;
	}

	public function addBlog($title, $image_title, $image_url, $first_name, $last_name, $publish_date,$content, $db){
		$sql = "INSERT INTO blogs (title, image_title, image_url, first_name, last_name, publish_date, content)
				VALUES (:title, :image_title, :image_url, :first_name, :last_name, :publish_date, :content) ";
		$pst = $db->prepare($sql);
		
		$pst->bindParam(':title', $title);
		$pst->bindParam(':image_title', $image_title);
		$pst->bindParam(':image_url', $image_url);
		$pst->bindParam(':first_name', $first_name);
		$pst->bindParam(':last_name', $last_name);
		$pst->bindParam(':publish_date', $publish_date);
		$pst->bindParam(':content', $content);

		$count = $pst->execute();
		return $count;		
	}

	public function deleteBlog($id,$db){
		$sql = "DELETE FROM blogs WHERE id= :id";

		$pst = $db->prepare($sql);

		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;
	}

	public function updateBlog($id,$title,$image_title,$image_url,$first_name,$last_name,$publish_date,$content,$db){
		$sql = "UPDATE blogs
				SET title = :title,
				image_title = :image_title,
				image_url = :image_url,
				first_name = :first_name,
				last_name = :last_name,
				publish_date = :publish_date,
				content = :content
				WHERE id= :id";

		$pst = $db->prepare($sql);
		
		$pst->bindParam(':title', $title);
		$pst->bindParam(':image_title', $image_title);
		$pst->bindParam(':image_url', $image_url);		
		$pst->bindParam(':first_name', $first_name);
		$pst->bindParam(':last_name', $last_name);
		$pst->bindParam(':publish_date', $publish_date);
		$pst->bindParam(':content', $content);
		$pst->bindParam(':id', $id);

		$count = $pst->execute();
		return $count;
	}
}

