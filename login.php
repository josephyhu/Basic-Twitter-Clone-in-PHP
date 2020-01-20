<?php
require_once 'inc/bootstrap.php';

$pageTitle = " | Login";

require_once 'inc/header.php';
?>
      <form action="/inc/doLogin.php" method="post">
        <label for="inputUsername">Username</label>
        <input type="username" id="inputUsername" name="username" required autofocus>
        <label for="inputPassword">Password</label>
        <input type="password" id="inputPassword" name="password" required>
        <input type="submit" value="Sign In">
      </form>
<?php require_once 'inc/footer.php';
