<?php
// This will run the path from the root to the database folder to get Database.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
// This will run the path from the root to the Class folder to get Menu.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Menu.php');
	
	$dbcon = Database::getDb();

	$b = new Menu();

	$mymenu = $b->getAllMenus(Database::getDb());


?>

<header>
	<nav>
		<div class="wrapper">
			<div id="top-logo">
				<a id="logo" href="homePage.php"><img src="images/Service-logo.png" id="logo-image"></a>
			</div>
			<div></div>
			<div class="deep-wrapper">
				<div id="Blog">
					<div class="box"><a href="blogPage.php">Blogs</a></div>
				</div>
				<div>
					<div class="box"><a href="career_main_page.php">Careers</div>
				</div>
				<div id="#Professional">
					<div class="box"><a href="#">Become A Professional</a></div>
				</div>
				<div id="SignUp">
					<div class="box" ><a href="./homePage.php">LOGOUT</a></div>
				</div>
				<div id="Search">
					<input type="text" name="Search" placeholder="Search for a Service"><input type="submit" value="Search">
				</div>
			</div>
		</div>
	</nav>
	<nav>
	<div class="menu-wrapper">
	<?php $categories = array(); ?>
		<?php foreach($mymenu as $menu) : ?>
			 
				<div class='menu-box'>
					<button class='dropbtn'><?= $menu->name ?>  </button> 
					<?php 
						$s = new Submenu();

						$mysubmenu = $s->getAllSubMenus(Database::getDb(),$menu->id);
					 ?>
					<?php foreach($mysubmenu as $submenu) : ?> 
					
					<?php $categories[] = $submenu->name; 
					
						$length = count($categories);	
					?>

					<?php for( $i = 0; $i < $length; $i++) : ?>
					<div class='dropdown-content'>
							<a href='#'><?= $categories[$i] ?></a>
					</div>
					<?php endfor; ?>
          <?php endforeach; ?>
					
				</div> 
				<?php endforeach; ?>
		</div>
	</nav>		
</header>
