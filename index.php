<?php
require_once 'inc/bootstrap.php';

require_once 'inc/header.php';
?>
    <main>
      <?php if (isAuthenticated()) : ?>
      <form action="inc/actions_tweets.php" method="post">
        <label for="tweet">Tweet</label><br>
        <textarea id="tweet" name="tweet" cols="40" rows="4" maxlength="300" placeholder="300 characters max" required></textarea>
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Tweet">
      </form>
      <?php endif; ?>
      <?php
      foreach (get_tweets() as $tweet) {
          echo "<p>" . htmlspecialchars($tweet['tweet']) . "</p>";
      }
      ?>
    </main>
<?php require_once 'inc/footer.php'; ?>
