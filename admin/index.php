<html>
    <head>
        <?php require_once(__DIR__ . '/../gui/style.php'); ?>
    </head>
    <body>
        <?php
            require_once(__DIR__ . '/../crud/user.php');

            // If not logged in
            if (!amLoggedIn()) {
                echo '
                    <form name="login" method="post" action="api/login.php">
                        <div class="message"><?php if(isset($message) && $message != "") { echo $message; } ?></div>
                            Email: <input type="text" name="email"><br>
                            Password: <input type="password" name="password"><br>
                            <input type="hidden" name="action" value="auth">
                            <input type="submit" name="submit" value="Submit"><br>
                        </div>
                    </form>
                    <a href="register.php">New user? Click here to register</a>';
            } else {
                $userId = myUserId();

                echo '<h3>Welcome, Sir/Madame</h3>';

                echo '
                    <form action="curator.php">
                        <input type="submit" value="Accept Curator Requests"/>
                    </form>
                ';
                echo '
                    <form action="museum.php">
                        <input type="submit" value="Add Museum"/>
                    </form>
                ';
                echo '
                    <form action="museum.php">
                        <input type="submit" value="Delete Museum"/>
                    </form>
                ';
                echo '
                    <form method="post" action="../api/users.php">
                        <input type="hidden" name="action" value="logout">
                        <input type="submit" value="Logout"/>
                    </form>
                ';
            }
        ?>
    </body>
</html>
