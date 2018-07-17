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

// TODO no duplicate requests
    function newRequest(int $user_id, int $museum_id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            // Create a request
            $sql = "
                INSERT INTO CuratorRequest(museum_id, visitor_id)
                VALUES(" . $museum_id . ", " . $user_id . ");
            ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Curator status requested";
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }
?>
