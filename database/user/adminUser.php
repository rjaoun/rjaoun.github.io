<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/User.php');

	$dbcon = Database::getDb();

	$u = new User();

	$myuser = $u->getAllUsers(Database::getDb());

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
      <table class="table p-5" style="margin-top: 5px;">
        <thead class="thead-dark">
          <tr>
            <th>User Name</th>
            <th> Email </th>
            <th>User Type</th>
            <th>Edit User Privilage</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($myuser as $user){
          echo "" .  
          "<tr>" .
            "<td class='w-25'>" . $user->username . "</td>" .
            "<td>" . $user->email . "</td>" .
            "<td>" . $user->user_type. "</td>" . 
            "<td>" .
              "<form action='userAdminEdit.php' method='post'>" .
                "<input type='hidden' name='id' value='$user->id' />" .
                "<input class='btn btn-primary float-left' type='submit' name='update' value='Update' />" .
              "</form>" .
            "</td>" .                
          "</tr>";
        }
        ?>
        </tbody>
      </table>
      <div class="text-center">
        <a href="admin.php" class="btn btn-primary w-25 p-3 m-5">Back to Admin Panel</a>
      </div>
  </div>
</div>
  </div>
</main>