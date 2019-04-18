<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Blog.php');

	$dbcon = Database::getDb();

	$b = new Blog();

	$myblog = $b->getAllBlogs(Database::getDb());

?>
<div class="container">
  <div class="row">
    <?php foreach($myblog as $blog){
    echo "" .
    "<div class='col-md-6'>" .
    "<div class='card mb-4'>" .
    "<img class='card-image-top' style='width:100%; height: 15vw; object-fit:cover;' src=images/" . $blog->image_url . ">" .
    "<div class='card-body'>" .
    "<h2 class='card-title'>" . $blog->title . "</h2>" .
    "<p class='card-text h-25 d-inline-block'>" .
      $blog->content .
    "</p>" .
    "<a href='#' class='btn btn-primary'>Read More &rarr;</a>" .
    "</div>" .
    "<div class='card-footer text-muted'>" .
        "Posted on " . $blog->publish_date . " by <strong>" . $blog->first_name . " " . $blog->last_name . "</strong>" .
    "</div>" .
    "</div>" .
  "</div>"; 
    }
    ?>    
  </div>
</div>