<?php
require_once 'class/Chat.php';
require_once 'database/Database.php';
$db = Database::getDb();
$name = $email = $response_msg = "";
session_start ();
function loginForm() {
    echo '
	<div class="form-group">
		<div id="loginform">
			<form action="chat.php" method="post">
			<h1>Simple Live Chat</h1><hr/>
				<label for="name">Please Enter Your Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"/>
                <span style="color:red;">
                <?php
                    if(isset($name_err)){
                        echo $name_err;
                    }
                    ?>
                </span>
                <label for="email">Please Enter Your Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email"/>
                <span style="color:red;">
                  <?php
                    if(isset($email_err)){
                      echo $email_err;
                    }
                  ?>
                </span>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Enter" />
                <div id="response">
                  <?php
                    echo $response_msg;
                  ?>
                </div>
			</form>
		</div>
	</div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $_SESSION ['email'] = $_POST ['email'];
        //save username and email-id in database
        $name = $_SESSION ['name'];
        $email = $_SESSION ['email'];
        $flag = 0;

        if($name == ""){
            $name_err = "Please enter name. ";
            $flag = 1;
        }
          if($email == ""){
            $email_err = "Please enter email. ";
            $flag = 1;
        }

        $c = new Chat();
        $x = 0;
        if($flag == 0){
            $visitors = $c->getAllVisitors($db);
            foreach($visitors as $v){
                if($email == $v->email){
                    $x = 1;
                }
            }
            if($x==0){
                $ch = $c->addVisitor($name,$email,$db);
                if($ch){
                  $response_msg = "Visitor added successfully";
                }else{
                  $response_msg = "Error in adding visitor";
                }
            }
            
        }
    } else {
        echo '<span class="error">Please Enter a Name</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    /*$cb = fopen ( "log.html", 'a' );
    fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>" );
    fclose ( $cb );*/
    session_destroy ();
    header ( "Location: chat.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Live chat</title>
	<link rel="stylesheet" href="styles/chatstyle.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="script/jquery.min.js"></script>
</head>
<body>
<?php
	if (! isset ( $_SESSION ['name'] )) {
	loginForm ();
	} else {
?>
<div id="wrapper">
	<div id="menu">
	<h1>Simple Live Chat!</h1><hr/>
		<p class="welcome"><b>HI - <a><?php echo $_SESSION['name']; echo $_SESSION['email'];?></a></b></p>
		<p class="logout"><a id="exit" href="#" class="btn btn-default">Exit Live Chat</a></p>
	<div style="clear: both"></div>
	</div>
	<div id="chatbox">
	<?php

        //get old messages by email
		 $c = new Chat();
         $m = $c->getMessageByVisitorId(1,$db);
         foreach($m as $message){
            echo $message->message;
         }

	?>
	</div>
<form name="message" action="">
    <input type='hidden' name = 'id' value="<?php $_SESSION['email']; ?>" />
	<input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Create A Message" />
	<input name="submitmsg" class="btn btn-default" type="submit" id="submitmsg" value="Send" />
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
});
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Are You Sure You Want To Leave This Page?");
        if(exit==true){window.location = 'chat.php?logout=true';}     
    });
});
$("#submitmsg").click(function(){
    alert();
    //save messages to database
    if ($_POST ['usermsg'] != "") {
        $c = new Chat();
        //need to fix it....figure it out how to get visitor_id

        $vis = $c->getVisitorByEmail($_POST['id'],$db);
        $visitor_id = $vis->id;
        alert($visitor_id);
        $message = $_POST ['usermsg'];
        $datetime = new DateTime();


        $count = $c->addMessage($visitor_id,$message,$datetime->format('Y-m-d H:i:s'),$db);

        if($count){
            $response_msg = "Message added successfully";
        }else{
            $response_msg = "Error in adding message";
        }
    }
        
    return false;
});
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}
setInterval (loadLog, 2500);
</script>
<?php
}
?>
</body>
</html>