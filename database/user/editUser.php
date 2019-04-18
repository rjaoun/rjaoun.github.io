
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/User.php');

if(isset($_POST['id'])){
	$id = $_POST['id'];
	$db = Database::getDb();

	$sql = "SELECT * FROM users WHERE id = :id";

	$pst = $db->prepare($sql);
	$pst->bindParam(':id', $id);
	$pst->execute();

	$user = $pst->fetch(PDO::FETCH_OBJ);

	//var_dump($blog);
}	
if(isset($_POST['updateuser'])){
	$id = $_POST['id'];
	$user_type = $_POST['user_type'];

	$db = Database::getDb();
	$u = new User();

	$count = $u->updateUser($id,$user_type,$db);

	if($count){
    ?>
    <script type="text/javascript">
    window.location.href = "userPage.php";
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
      <h2>Edit User Privilage</h2>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user->id ?>" />
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">User Type:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="user_type" value="<?= $user->user_type ?>"/>
          </div>
        </div>
        <div class="text-center">
        <input type="submit" name="updateuser" value="Edit" class="btn btn-primary btn-lg">   
        </div>                                    
      </form>
    </div>
  </div>
</main>