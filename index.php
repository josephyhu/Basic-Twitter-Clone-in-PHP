<?php
require_once 'inc/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tweet = filter_input(INPUT_POST, 'tweet', FILTER_SANITIZE_STRING);
    $user_id = decodeAuthCookie('auth_user_id');

    if (add_tweet($tweet, $user_id)) {
        header('Location: index.php');
    } else {
        $session->getFlashBag()->add('error', 'Unable to add tweet');
    }
}

include 'inc/header.php';
?>
    <main>
      <?php if (isAuthenticated()) : ?>
      <form action="index.php" method="post">
        <label for="tweet">Tweet</label><br>
        <textarea id="tweet" name="tweet" cols="40" rows="4" maxlength="300" placeholder="300 characters max" required></textarea>
        <input type="submit" value="Tweet">
      </form>
      <?php endif; ?>
      <?php
      foreach (get_tweets() as $item) {
          echo "<p>" . htmlspecialchars($item['tweet']) . "</p>";
      }
      ?>
    </main>
<?php include 'inc/footer.php'; ?>
