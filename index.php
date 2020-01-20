<?php
require_once 'inc/bootstrap.php';

include 'inc/header.php';
?>
    <main>
      <?php if (isAuthenticated()) : ?>
      <form action="inc/actions_tweets.php" method="post">
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
