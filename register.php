<?php
require_once 'inc/bootstrap.php';

$pageTitle = " | Register";

include 'inc/header.php';
?>
      <form action="/inc/doRegister.php" method="post">
        <label for="inputUsername">Username</label>
        <input type="username" id="inputUsername" name="username" required autofocus>
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" required>
        <label for="inputPassword">Confirm Password</label>
        <input type="password" id="inputPassword" name="confirm_password" required>
        <input type="submit" value="Register">
      </form>
<?php include 'inc/footer.php'; ?>
