<?php
require 'require/database.php';
include 'includes/head.php';
?>
<!DOCTYPE html>
<html>

  <body>
    <h2>Forgot password</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>
        <button type="submit">Send me a random password</button>
      </div>
    </form>
  </body>
</html>