<html>
    <body>
        <?php
            require_once(__DIR__ . '/api/museums.php');
            require_once(__DIR__ . '/crud/user.php');
            // If not logged in
            if (!isset($_COOKIE['token'])) {
                echo '
                    <form name="login" method="post" action="api/login.php">
                        <div class="message"><?php if(isset($message) && $message != "") { echo $message; } ?></div>
                            Email: <input type="text" name="email"><br>
                            Password: <input type="password" name="password"><br>
                            <input type="submit" name="submit" value="Submit"><br>
                        </div>
                    </form>
                    <a href="register.php">New user? Click here to register</a>';
            } else {
                echo '<h3>Home page</h3>';
                echo '<p>Welcome, <i>' . getUser($_COOKIE['token'])['email'] . '</i>!</p>';
                $museums = getMuseums();
                foreach ($museums as $museum) {
                    echo implode(", ", $museum) . "<br>";
                }
                echo '
                    <form action="manage.php">
                        <input type="submit" value="Manage Account"/>
                    </form>';
            }
        ?>
    </body>
</html>
