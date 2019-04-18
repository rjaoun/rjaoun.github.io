<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Blog.php');

		if(isset($_POST['addblog'])){
			$title = $_POST['title'];
			$image_title = $_POST['image_title'];
			$image_url = $_POST['image_url'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
      		$publish_date = $_POST['publish_date'];
      		$content = $_POST['content'];


			$db = Database::getDb();
			$b = new Blog();

			$c = $b->addBlog($title, $image_title, $image_url, $first_name, $last_name, $publish_date,$content, $db);
			if($c){
				header('Location: ../../blogPage.php');
			}else{
				echo "there is a problem adding a new blog";
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
      <h2>Add a Blog</h2>
      <form action="" method="post">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Title:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="title">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Image Title:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="image_title">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Image URL:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="image_url">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">First Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Last Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Publish Date:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" name="publish_date">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Content:</label>
          <div class="col-sm-10">
            <textarea  class="form-control" name="content"></textarea>
          </div>
        </div> 
        <div class="text-center">
        <input type="submit" name="addblog" value="Add" class="btn btn-primary btn-lg">   
        </div>                                    
      </form>
    </div>
  </div>
</main>
