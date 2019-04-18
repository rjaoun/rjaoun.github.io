<?php

session_start();
// This will run the path from the root to the database folder to get Database.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/database/Database.php');
// This will run the path from the root to the Class folder to get Menu.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/project-merj-2019/class/Menu.php');
	
	$dbcon = Database::getDb();

	$b = new Menu();

	$mymenu = $b->getAllMenus(Database::getDb());


?>  
  <!-- Header -->
  <header class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
              <img src="images/Service-logo.png" alt="">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="blogPage.php">Blogs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="career_main_page.php">Careers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Become A Professional</a>
            </li>
            <li class="nav-item">
            <?php if(isset($_SESSION["loggedin"])): ?>
              <a class="nav-link" href="logout.php">Logout</a>
            <?php else: ?>
              <a class="nav-link" href="register1.php">Register/Login</a>
            <?php endif; ?>  
            </li>
            <li class="nav-item">
              <div class="span12">
                <form id="custom-search-form" class="form-search form-horizontal pull-right">
                    <div class="input-append span12">
                        <input type="text" class="search-query" placeholder="Search">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="menu">
      <div class="container nav nav-fill justify-content-center">
        <?php foreach ($mymenu as $menu): ?>
        <div class="dropdown nav-item">
          <button class="btn btn-light" type="button" data-toggle="dropdown">
            <?= $menu->name ?>
          </button>
          <?php
            $s = new Submenu();
            $mysubmenu = $s->getAllSubMenus(Database::getDb(),$menu->id);
          ?>
          <ul class="dropdown-menu">
            <?php foreach ($mysubmenu as $submenu) :?>
              <li><a href="#" class="nav-link"><?= $submenu->name ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endforeach; ?>
      </div>
</div>
</header>
