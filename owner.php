<?php
require_once 'inc/bootstrap.php';
requireOwner();

$pageTitle = " | Owner Panel";

include 'inc/header.php';
?>
    <?php
    echo "<p><a href='inc/delete_all_users.php'";
    echo " onclick=\"return confirm('Do you want to delete all users (except yourself)?');\"";
    echo ">Delete All Users</a></p>";
    echo "<p><a href='inc/delete_all_tweets.php?'";
    echo " onclick=\"return confirm('Do you want to delete all tweets?');\"";
    echo ">Delete All Tweets</a></p>";
    ?>
<?php include 'inc/footer.php'; ?>
