<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Blog.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$db = Database::getDb();

	$sql = "SELECT * FROM blogs WHERE id = :id";

	$pst = $db->prepare($sql);
	$pst->bindParam(':id', $id);
	$pst->execute();

	$blog = $pst->fetch(PDO::FETCH_OBJ);

	//var_dump($blog);
}	
if(isset($_POST['updateblog'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$image_title = $_POST['image_title'];
	$image_url = $_POST['image_url'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$publish_date = $_POST['publish_date'];
	$content = $_POST['content'];

	$db = Database::getDb();
	$b = new Blog();

	$count = $b->updateBlog($id,$title,$image_title,$image_url,$first_name,$last_name,$publish_date,$content,$db);

	if($count){
    ?>
    <script type="text/javascript">
    window.location.href = "blogAdmin.php";
    </script>
    <?php
	}else{
		echo "problem showing blog table values";
	}
}

?>


<main>
  <div class="wrapper">
      <!-- Sidebar -->
      <nav id="sidebar" class="bg-secondary">
        <div class="sidebar-header ">
          <h2>Admin Panel</h2>
        </div>

        <ul class="list-unstyled components">
          <h3>Pages</h3>
          <li class="active">
            <a href="blogAdmin.php">Blogs</a>
          </li>
          <li class="active">
            <a href="#careerSubmenu">Careers</a>
          </li> 
          <li class="active">
            <a href="#serviceSubmenu">Services</a>
          </li>
          <li class="active">
            <a href="#reviewSubmenu">Reviews</a>
          </li>              
        </ul>
      </nav>
    <div class="container">
      <h2>Edit Blog</h2>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $blog->id ?>" />
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Title:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="title" value="<?= $blog->title ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Image Title:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="image_title" value="<?= $blog->image_title ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Image URL:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="image_url"value="<?= $blog->image_url ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">First Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name" value="<?= $blog->first_name ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Last Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name" value="<?= $blog->last_name ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Publish Date:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="publish_date" value="<?= $blog->publish_date ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Content:</label>
          <div class="col-sm-10">
            <textarea  class="form-control" name="content"><?= $blog->content ?></textarea>
          </div>
        </div> 
        <div class="text-center">
        <input type="submit" name="updateblog" value="Edit" class="btn btn-primary btn-lg">   
        </div>                                    
      </form>
    </div>
  </div>
</main>