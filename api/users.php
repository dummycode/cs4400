<?php
    require_once(__DIR__ . '/../crud/database.php');
    require_once(__DIR__ . '/../crud/user.php');
    require_once(__DIR__  . '/login.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'logout':
                logout();
                break;
            case 'delete':
                deleteUser();
                break;
            case 'create':
                createUser();
                break;
            default:
                break;
        }
    }

    function deleteUser() {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        $sql = "DELETE FROM Visitor WHERE id='" . myUserId() . "';";

        if (mysqli_query($conn, $sql)) {
            logout();
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }

    function createUser() {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        if (count($_POST) != 7) {
            echo "Incorrect arguments";
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $card_number = $_POST['card_number'];
            $exp_month = $_POST['exp_month'];
            $exp_year = $_POST['exp_year'];
            $security_number = $_POST['security_number'];

            $sql = "SELECT *
                    FROM Visitor
                    WHERE email ='" . $email . "';";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Already have a ticket
                if (mysqli_num_rows($result) > 0) {
                    echo "An account with this email already exists";
                } else {
                    $sql = "
                        INSERT INTO Visitor (id, email, password, card_number, exp_month, exp_year, security_number)
                        VALUES (
                            null,
                            '" . $email . "',
                            '" . $password . "',
                            '" . $card_number . "',
                            '" . $exp_month . "',
                            '" . $exp_year . "',
                            '" . $security_number . "'
                        )
                    ";

                    if (mysqli_query($conn, $sql)) {
                        authenticate($email, $password);
                        die();
                    } else {
                        echo "Failed query<br>" . mysqli_error($conn);
                    }
                }
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function isAdmin($email, $password) {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
            die();
        }

        $sql = "
            SELECT * FROM Admin
            WHERE email='" . $email . "' AND password='" . $password . "';
        ";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            return $result;
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
            die();
        }
    }

    function logout() {
        setcookie('token', '', time() - 3600, "/");
        header("Location: ../index.php");
        die();
    }
?>
