
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/register.css">
  <script src="javascript/script.js"></script>
</head>

<body class="container" style="padding-left: 0px;
padding-right: 0px; margin: 0 auto; width: 1200px">
<!-- header.php -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/header.php'); ?>

<!-- main.php -->



<?php
require_once "database/config.php";


// Define the variables we will use and intialize them to empty string
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = ""; 
$errors = array();

// process when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // username validation
  if(empty(trim($_POST["username"]))){
    $username_err = "Username is required.";
    array_push($errors, "Username is required.");
  }
  else{
    $sql = "SELECT id FROM users WHERE username = :username";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $param_username = trim($_POST["username"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          $username_err = "This username is already taken.";
          array_push($errors, "This username is already taken.");
        }
        else{
          $username = trim($_POST["username"]);
        }
      }
      else{
        echo "Something went wrong! Please try again later. user error";
      }
    }
    unset($stmt);
  }

  if(empty(trim($_POST["email"]))){
    $email_err = "Email is required.";
    array_push($errors, "Email is required.");
  }
  else{
    $sql = "SELECT id FROM users WHERE email = :email";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $param_email = trim($_POST["email"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
        $email_err = "This email already exist.";
        array_push($errors, "This email already exist.");
      }
      else{
        $email = trim($_POST["email"]);
      }
    }
    else{
      echo "Something went wrong! Please try again later. user error";
    }
  }
  unset($stmt);
}



  //password validation
  if(empty(trim($_POST["password"]))){
    $password_err = "Password is required.";
    array_push($errors, "Password is required.");
    // make sure password length is at least 6 characters
  } elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have at least 6 characters";
    array_push($errors, "Password must have at least 6 characters");
  }  
  else{
    $password = trim($_POST["password"]);
  }

  // validate match password
  if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm your password.";
    array_push($errors, "Please confirm your password.");
  }
  else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password))
    {
      $confirm_password_err = "Password did not match.";
      array_push($errors, "Password does not match.");
    }
  }
  
  // register user if there are no errors in the form
  if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err))
  {
    $sql = "INSERT INTO users (username, email, user_type, password) VALUES (:username, :email, :user_type, :password)";
    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
      $stmt->bindParam(":user_type", $param_user_type, PDO::PARAM_STR);

      $param_username = $username;
      $param_email = $email;
      $param_user_type = "user";
      // This method is to create password hash to encrypt the password when saved in the database
      $param_password = password_hash($password, PASSWORD_DEFAULT);

      if($stmt->execute()){
        session_start();

        // this will make session available in other pages
        $_SESSION["loggedin"] = true;
        // we need to get the id and username since we will need to show the username value in some of the pages.
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = $user_type;
      ?>
        <!-- if all requirements are met for registeration, redirect to welcome page -->
        <script type="text/javascript">
        window.location.href = "welcome.php";
        </script>
      <?php  
      }
      else{
        echo "Something went wrong. Please try again later.";
      }
    }
    // close statement
    unset($stmt);
  }
  // close connection
  unset($dbcon);
}
// this function to display erros in the register panel.
function display_error() {
  global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
?>

  <div class="header">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
  </div>
  <!-- we use htmlspecialchars to escape the data before displaying it in the browser for security purposes -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form1">

    <?php echo display_error(); ?>

    <div class="input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
      <label>Username</label>
      <input type="text" name="username" value = "<?php echo $username; ?>">
    </div>  

    <div class="input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" >
      <label>E-mail</label>
      <input type="text" name="email" value = "<?php echo $email; ?>">
    </div>      

    <div class="input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
      <label>Password</label>
      <input type="password" name="password" value = "<?php echo $password; ?>">
    </div>

    <div class="input-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" >
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" value = "<?php echo $confirm_password; ?>">
    </div> 
    
    <div class="form-row text-center">
      <div class="col-12">
        <button type="submit" class="btn w-50">Sign up</button>
      </div>
    </div>

    <p>Already have an account? <a href="login1.php"> Login here </a>. </p>
  </form>



<!-- footer.php -->

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/footer.php'); ?>

</body>
</html>