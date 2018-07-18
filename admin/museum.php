<?php
    session_start();
    $message = '';
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<html>
    <head>
        <?php
            echo "
                <script type='text/javascript'>
                    function bodyLoaded() {
                        if ('$message') {
                            alert('$message');
                        }
                    }
                </script>
            ";
        ?>
    </head>
    <body onload="bodyLoaded()">
        <?php
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'add':
                        addMuseumView();
                        break;
                    case 'delete':
                        deleteMuseumView();
                        break;
                    default:
                        break;
                }
            }

            function addMuseumView() {
                require_once(__DIR__ . '/../gui/museums.php');
                echo newMuseumForm();
                // add museum here
            }

            function deleteMuseumView() {
                require_once(__DIR__ . '/../gui/museums.php');
                echo deleteMuseumForm();
            }
        ?>
    </body>
</html>
