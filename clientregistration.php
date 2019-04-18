<?php
  require_once 'database/Database.php';
  require_once 'database/clientregistration/Client.php';

  $fname=$lname=$uname=$password=$email=$phonenumber=
  $street=$city=$postalcode=$privilege="";
  //Get the information from submitted form.
   if(isset($_POST['submit']))
  { 
    //user information get from the form  
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $uname = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['emailid'];
    $phonenumber = $_POST['phone_number'];
    $street = $_POST['street_name'];
    $city = $_POST['city'];
    $postalcode = $_POST['postal_code'];
    $privilege = $_POST['privilege'];
    $flag = 1 ;

    //regex pattern for firstname,lastname and username.
    

     $namepattern="/^[A-Za-z-,]{3,20}$/";
        //firstname validation
        if($fname == "" ){
           $nameerror = "please enter value";
           $flag = 0 ;
           }
      elseif(!preg_match($namepattern, $fname)){
              $nameerror = "Enter only letter";
              $flag = 0 ;  
            } 

        //lastname validation
        if($lname == "" ){
           $lnameerror = "please enter value";
           $flag = 0 ;
           }
        elseif(!preg_match($namepattern, $lname)){
          $lnameerror = "Enter only letters";
          $flag = 0 ;
          } 
        
        //username validation
        if($uname == "" ){
           $unameerror = "please enter value";
           $flag = 0 ;
           }
        elseif(!preg_match($namepattern, $uname)){
          $unameerror = "Enter only letters";
          $flag = 0 ;
          } 
    // regex for password
    $passwordpattern = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";
       // password validation
       if($password == ""){
          $pswerror = "Please enter Password";
          $flag = 0 ;
          }
      elseif(!preg_match($passwordpattern, $password)){
          $pswerror = "Password length should be minimum 8 character which cointain 1 uppercase,1 lowercase and at least one digit";
           $flag = 0 ;
          } 

    // regex for password
    $phonepattern = "/[0-9]{10}/";
      //phone number validation
       if($phonenumber == ""){
           $pherror = "Please enter Phone number";
           $flag = 0 ;
        }
       elseif(!preg_match($phonepattern, $phonenumber)){
              $pherror = "Enter valid phone number";
              $flag = 0 ;
        } 
    //regex for postal code
    $postalpattern = "/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/";
        //postalcode validation
       if($postalcode == ""){
            $postalerror = "Please enter Postalcode";
            $flag = 0 ;
          }
       elseif(!preg_match($postalpattern, $postalcode)){
              $postalerror = "Enter valid Postalcode";
              $flag = 0 ;  
            } 
    // declaring database
    $db = Database::getdb();
    $c = new Client();
    

    if($flag == 1){

            $addedclient = $c->addClients( $fname,$lname,$uname,$password, $email, $phonenumber,$street,$city,$postalcode,$privilege, $db);

           if($addedclient){
                 $message = $fname.$lname."thank you for registration";
                }
           else{
                $message = "problem in registration try again";
               }
           }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Client Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Your custom styles (optional) -->
  <link rel='stylesheet' type='text/css' href='styles/style.css'>
  <link rel='stylesheet' type='text/css' href='styles/clientregistration.css'>
</head>

<body>
<!-- header.php -->
   <?php require_once 'body/header.php' ?>
<main id="signup_section"> 
    <h1 id="heading">Sign Up</h1><span style="color:green; font-size:20px;">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?></span>
	<form action="" method="post" class="form-horizontal">
     <div class="form-group">
        <label class="control-label col-sm-2" for="first_name">Frist name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="first_name"><span style="color:red;">
            <?php
                if(isset($nameerror)){
                    echo $nameerror;
                }
            ?></span>
        </div>
     </div>
     <div class="form-group">
        <label class="control-label col-sm-2">Last name</label>
        <div class="col-sm-6">
         <input type="text" class="form-control" name="last_name"><span style="color:red;">
            <?php
                if(isset($lnameerror)){
                    echo $lnameerror;
                }
            ?></span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">User name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="user_name"/><span style="color:red;">
            <?php
                if(isset($unameerror)){
                    echo $unameerror;
                }
            ?></span>
        </div>
     </div>

     <div class="form-group">
        <label class="control-label col-sm-2">Password</label>
        <div class="col-sm-6">
         <input type="password" class="form-control" name="password"/><span style="color:red;">
            <?php
                if(isset($pswerror)){
                    echo $pswerror;
                }
            ?></span>
        </div>
     </div>
     <div class="form-group">
        <label class="control-label col-sm-2">EmailID</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="emailid"/>
        </div>
     </div>
     <div class="form-group">
        <label class="control-label col-sm-2">Phone number</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="phone_number"/><span style="color:red;">
            <?php
                if(isset($pherror)){
                    echo $pherror;
                }
            ?></span>
        </div>
     </div>
     <div class="form-group">
        <label class="control-label col-sm-2">Street name</label>
        <div class="col-sm-6">
         <input type="text" class="form-control" name="street_name"/>
        </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">City</label>
       <div class="col-sm-6">
        <input type="text" class="form-control" name="city"/>
       </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Postal code</label>
       <div class="col-sm-6">
         <input type="text" class="form-control" name="postal_code"/><span style="color:red;">
            <?php
                if(isset($postalerror)){
                    echo $postalerror;
                }
            ?></span>
       </div>
     </div>
     <div class="form-group">
       <label class="control-label col-sm-2">Privilege</label>
       <div class="col-sm-6">
         <input type="text" class="form-control" name="privilege" placeholder="user/admin" />
       </div>
     </div>
    <div class="form-group"> 
     <div class="col-sm-offset-2 col-sm-6">
       <button type="submit" class="btn btn-default" id="submit_btn" name="submit">Submit</button>
     </div>
    </div>
 </form>
</main>
<footer>
	<?php require_once 'body/footer.php' ?>
</footer>
</body>
</html>
