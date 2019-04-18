<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Blog.php');

	$dbcon = Database::getDb();

	$b = new Blog();

	$myblog = $b->getAllBlogs(Database::getDb());

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
      <div class="text-center">
        <a href="blogAdminAdd.php" class="btn btn-primary w-25 p-3 m-5">Add a Blog</a>
      </div>       
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Title</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Publish Date</th>
            <th> CRUD Features</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($myblog as $blog){
          echo "" .  
          "<tr>" .
            "<td class='w-25'>" . $blog->title . "</td>" .
            "<td>" . $blog->first_name . "</td>" .
            "<td>" . $blog->last_name . "</td>" . 
            "<td>" . $blog->publish_date . "</td>" .
            "<td>" . 
              "<form action='blogAdminEdit.php' method='post'>" .
                "<input type='hidden' name='id' value='$blog->id' />" .
                "<input class='btn btn-primary float-left' type='submit' name='update' value='Update' />" .
              "</form>" .            
              "<form action='database/blog/deleteBlog.php' method='post'>" .
                "<input type='hidden' name='id' value='$blog->id' />" .
                "<input class='btn btn-danger float-right' type='submit' name='delete' value='Delete' />" .
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