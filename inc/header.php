<!DOCTYPE html>
<html>
  <head>
    <title>A Basic Twitter-Clone<?php echo $pageTitle; ?></title>
  </head>
  <body>
    <header>
      <h1>A Basic Twitter-Clone<?php echo $pageTitle; ?></h1>
      <nav>
        <?php if (isAuthenticated()) : ?>
        <a href="index.php">Home</a>
        <a href="profile.php">My Profile</a>
        <a href="inc/doLogout.php">Logout</a>
        <?php else : ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <?php endif; ?>
      </nav>
    </header>
