<?php
require_once 'inc/bootstrap.php';
requireAuth();

$pageTitle = " | My Profile";
$user_id = decodeAuthCookie('auth_user_id');
$tweet = filter_input(INPUT_POST, 'tweet', FILTER_SANITIZE_STRING);

if (add_tweet($tweet, $user_id)) {
    header('Location: profile.php');
} else {
    $session->getFlashBag()->add('error', 'Unable to add tweet');
}

$tweets = get_tweets_by_user_id($user_id);

include 'inc/header.php';
?>
    <main>
      <form action="profile.php" method="post">
        <label for="tweet">Tweet</label><br>
        <textarea id="tweet" name="tweet" cols="40" rows="4" maxlength="300" placeholder="300 characters max" required></textarea>
        <input type="submit" value="Tweet">
      </form>
      <?php
      foreach ($tweets as $item) {
          echo "<p>" . htmlspecialchars($item['tweet']) . "</p>";
          echo "<a href='inc/delete_tweet.php?tweet_id=".$item['id'];
          echo "' onclick=\"return confirm('Do you want to delete this tweet?');\"";
          echo "'>Delete</a>";
      }
      ?>
    </main>
<?php include 'inc/footer.php'; ?>
