<?php
    require_once(__DIR__ . '/../crud/database.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'approve':
                approveRequest($_POST['id'], $_POST['museum_id'], $_POST['visitor_id']);
                break;
            case 'remove':
                removeRequest($_POST['id']);
                break;
            default:
                break;
        }
    }

    function getAllCuratorRequests() {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "
                SELECT CuratorRequest.id, email, name, museum_id, visitor_id
                FROM ((CuratorRequest LEFT JOIN Visitor ON Visitor.id = CuratorRequest.visitor_id)
                    LEFT JOIN Museum ON Museum.id = CuratorRequest.museum_id);
            ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $requests = [];
                while($request = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $requests[] = $request;
                }
                return $requests;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function approveRequest(int $id, int $museum_id, int $visitor_id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "UPDATE Museum SET curator_id='" . $visitor_id . "' WHERE id='" . $museum_id . "'";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                removeRequest($id);
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function removeRequest(int $id) {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        $sql = "DELETE FROM CuratorRequest WHERE id='" . $id . "';";

        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION['message'] = 'Updated request';
            header('Location: ../admin/requests.php');
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }
?>
