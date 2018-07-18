<html>
    <body onload="bodyLoaded()">
        <?php
            session_start();
            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                echo "
                    <script type='text/javascript'>
                        function bodyLoaded() {
                            alert('$message');
                        }
                    </script>";
                unset($_SESSION['message']);
            }
        ?>
        <h2>My Tickets</h2>
        <?php
            require_once(__DIR__ . '/gui/tickets.php');
            require_once(__DIR__ . '/crud/user.php');
            displayMyTickets(myUserId());
        ?>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
