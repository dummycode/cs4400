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
            
            require_once(__DIR__ . '/gui/curator.php');

            echo requestForm();
        ?>
        <form action="manage.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
