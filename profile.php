<?php
require_once 'inc/bootstrap.php';
requireAuth();

$pageTitle = " | My Profile";
$user_id = decodeAuthCookie('auth_user_id');
$tweets = get_tweets_by_user_id($user_id);

require_once 'inc/header.php';
?>
    <main>
      <form action="inc/actions_tweets.php" method="post">
        <label for="tweet">Tweet</label><br>
        <textarea id="tweet" name="tweet" cols="40" rows="4" maxlength="300" placeholder="300 characters max" required></textarea>
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Tweet">
      </form>
      <?php
      foreach ($tweets as $tweet) {
          echo "<p>" . htmlspecialchars($tweet['tweet']) . "<p>";
          echo "<a href='inc/actions_tweets.php?action=delete&tweet_id".$tweet['id'];
          echo "' onclick=\"return confirm('Do you want to delete this tweet?');\"";
          echo "'>Delete</a>";
      }
      ?>
    </main>
<?php require_once 'inc/footer.php'; ?>
