<?php
require_once 'inc/bootstrap.php';
requireAdmin();

$user_id = decodeAuthCookie('auth_user_id');
$users = getAllUsers();

$pageTitle = " | Admin Panel";

include 'inc/header.php';
?>
    <?php
    foreach ($users as $user) {
        if ($user['id'] != $user_id) {
            echo "<h3><a href='user.php?id=" . $user['id'] . "'>" . $user['username'] . "</a></h3>";
            if ($user['role_id'] == 0 || isOwner()) {
                echo "<a href='inc/delete_user.php?id=".$user['id'];
                echo "' onclick=\"return confirm('Do you want to delete this user?');\"";
                echo ">Delete User</a>";
            }
        } else {
            echo "<h3><a href='profile.php'>" . $user['username'] . "</a></h3>";
        }
    }
    ?>
<?php include 'inc/footer.php'; ?>
