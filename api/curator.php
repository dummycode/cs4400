<?php
    require_once(__DIR__ . '/../crud/database.php');
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'request':
                newRequest($_POST['id'], $_POST['museum_id']);
                break;
            default:
                break;
        }
    }

    function newRequest(int $user_id, int $museum_id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT *
                    FROM Museum
                    WHERE curator_id='" . $user_id . "' AND id='" . $museum_id . "';";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Already curating?
                if (mysqli_num_rows($result) > 0) {
                    session_start();
                    $_SESSION['message'] = 'You are already curating this museum';
                    header('Location: ../request.php');
                } else {
                    $sql = "SELECT *
                            FROM CuratorRequest
                            WHERE visitor_id='" . $user_id . "' AND museum_id='" . $museum_id . "';";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        // Duplicate request?
                        if (mysqli_num_rows($result) > 0) {
                            session_start();
                            $_SESSION['message'] = 'You have already requested to curate this museum';
                            header('Location: ../request.php');
                        } else {
                            // Create a request
                            $sql = "
                                INSERT INTO CuratorRequest(museum_id, visitor_id)
                                VALUES(" . $museum_id . ", " . $user_id . ");
                            ";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                session_start();
                                $_SESSION['message'] = 'Curator request made';
                                header('Location: ../request.php');
                            } else {
                                echo "Failed query<br>" . mysqli_error($conn);
                            }
                        }
                    } else {
                        echo "Failed query<br>" . mysqli_error($conn);
                    }
                }
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }
?>
