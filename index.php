<?php
require_once 'inc/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tweet = filter_input(INPUT_POST, 'tweet', FILTER_SANITIZE_STRING);

  if (add_tweet($tweet)) {
    header('Location: index.php');
  } else {
    echo 'Tweet failed. Try again.';
  }
}

require_once 'inc/header.php';
?>
    <main>
      <form action="index.php" method="post">
        <textarea name="tweet" cols="40" rows="4" maxlength="300" placeholder="300 characters max" required></textarea>
        <input type="submit" value="Tweet">
      </form>
      <?php
      foreach (get_tweets() as $entry) {
        echo "<p>" . $entry['tweet'] . "</p>";
      }
      ?>
    </main>
<?php require_once 'inc/footer.php'; ?>
