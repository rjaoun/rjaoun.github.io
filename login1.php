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
padding-right: 0px; margin: 0 auto; width: 1200px;">
<!-- header.php -->
<?php require_once "body/header.php" ?>

<!-- main.php -->

<?php
// Initialize the session

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  ?>
  <script type="text/javascript">
  window.location.href = "welcome.php";
  </script>  
<?php
    exit;
}


require_once "database/config.php";
$username = $password = "";
$username_err = $password_err = "";
$errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
    array_push($errors,"Please enter username.");
  }
  else{
    $username = trim($_POST["username"]);
  }

  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
    array_push($errors,"Please enter your password.");
  }
  else{
    $password = trim($_POST["password"]);
  }

  if(empty($username_err) && empty($password_err)){
    $sql = "SELECT id, username, user_type, password FROM users WHERE username = :username";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

      $param_username = trim($_POST["username"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          if($row = $stmt->fetch()){
            $id= $row["id"];
            $username = $row["username"];
            $user_type = $row["user_type"];
            $hashed_password = $row["password"];

            if(password_verify($password, $hashed_password)){
            // password is correct, then start new session

              session_start();

              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["user_type"] = $user_type;
              ?>  
              <script type="text/javascript">
              window.location.href = 'welcome.php';
              </script>
              <?php
            }
            else{
              $password_err="The password you entered is not valid.";
              array_push($errors,"The password you entered is not valid.");
            }
          }
        }
        else{
          $username_err = "No account found with that username.";
          array_push($errors,"No account found with that username.");
        }
      }
      else {
        echo "Something went wrong. Please try again later.";
      }
    }
    unset($stmt);
  }
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
    <h2>Login Page </h2>
    <p>Please fill in your credentials to login.</p>
  </div>
  <form class="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    
  <?php echo display_error(); ?>
    
    <div class="input-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label>Password</label>
      <input type="password" name="password">
    </div>    
    <div class="form-row text-center">
      <div class="col-12">
        <button type="submit" class="btn w-50">Login</button>
      </div>
    </div>
    <p>Don't have an account? <a href="register1.php">Sign up now</a>.</p>
</form>

<!-- footer.php -->

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/body/footer.php'); ?>

</body>
</html>