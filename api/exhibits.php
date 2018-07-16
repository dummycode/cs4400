<?php
    require_once(__DIR__ . '/../crud/database.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'remove':
                removeExhibit($_POST['id'], $_POST['museum_id']);
                break;
            default:
                break;
        }
    }

    function getExhibitsForMuseum(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "
                SELECT * FROM Exhibit WHERE museum_id='" . $id . "';
            ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $exhibits = [];
                while($exhibit = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $exhibits[] = $exhibit;
                }
                return $exhibits;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function removeExhibit($exhibit_id, $museum_id) {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        $sql = "DELETE FROM Exhibit WHERE id='" . $exhibit_id . "';";

        if (mysqli_query($conn, $sql)) {
            header("Location: ../museum.php?id=" . $museum_id . "&curator=1");
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }

?>
