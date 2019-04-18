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

    <!-- Page Content -->
    <div id="content">
        <h1>Hello <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <p>As an admin, you are entitled with the privilage of admin where you can add, edit, delete
          and view all of the pages of the project.
        </p>
        <div class="text-center">
          <a href="userAdmin.php" class="btn btn-primary w-25 p-3 m-5">Users List</a>
        </div>
        <p>
          We have couple of pages working on
          <ul>
            <li>Blogs</li>
              <ul>
                <li>Blogs feature were created by <strong>Rabih Aoun</strong></li>
                <li>All the blogs of the projects will be shown here</li>
                <li>The ability of creating a new blog and posting it</li>
                <li>You will be able to edit a specific blog, delete it or view it</li>
              </ul>
            <li>Careers</li>
            <ul>
                <li>Careers feature were created by <strong>Margi Petal</strong></li>
                <li>All the careers of the projects will be shown here</li>                
                <li>A list of all available positions will be shown</li>
                <li>The ability of adding a new job posting</li>
                <li>You will be able to edit a specific posting, delete it or view it</li>
              </ul>            
            <li>Services</li>
            <li>Reviews</li>
            <li>Book an Appointment</li>
              <ul>
                <li>Book an Appointment feature were created by <strong>Ekta Patel</strong></li>
                <li>Clients will be able to book an appointment for a specific service</li>
                <li></li>
              </ul>
          </ul>
        </p>
    </div>
  </div>
</main>