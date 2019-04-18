<?php

    require_once 'database/Database.php';
    require_once 'database/faq/FAQ.php';
  //Get information from the form when form submitted
  if(isset($_POST['submit']))
  {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $db = Database:: getdb();
    $faq = new FAQ();
    $addedfaq = $faq->addFAQ($question,$answer,$db);
    
    if($addedfaq){
      header('Location:listfaqs_admin.php');// Go to the list of faq page.
    }
    else{
      echo "problem adding a student";
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>FAQ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!-- Your custom styles (optional) -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js">
  </script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.js">
  </script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel='stylesheet' type='text/css' href='styles/style.css'>
  <link rel='stylesheet' type='text/css' href='styles/faqstyle.css'>
</head>

<body>
<!-- header.php -->
  <?php require_once 'body/header.php' ?>
<main id="faq_section">
  <h3>Add FAQ question answer</h3>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <form action="" method="post">
          <div class="form-group">
            <label>FAQ Question</label>
            <input type="text" class="form-control" id="faqquestion" name="question" required>
            <label>FAQ Answer</label>
            <input type="text" class="form-control" id="faqanswer" name="answer" required>
            <button class="btn btn-primary" name="submit">SUBMIT</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<footer>
  <?php require_once 'body/footer.php' ?>
</footer>
</body>
</html>