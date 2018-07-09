<html>
  <body>
    <?php
      if (!isset($_COOKIE['token'])) {
        echo '
          <form name="login" method="post" action="api/login.php">
            <div class="message"><?php if(isset($message) && $message != "") { echo $message; } ?></div>
              Email: <input type="text" name="email"><br>
              Password: <input type="password" name="password"><br>
              <input type="submit" name="submit" value="Submit"><br>
            </div>
          </form>';
      } else {
          echo 'Home page';
      }
    ?>
  </body>
</html>
