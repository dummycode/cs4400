<?php
    require_once(__DIR__ . '/../crud/database.php');

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                newMuseum($_POST['name']);
                break;
            case 'delete':
                deleteMuseum($_POST['id']);
                break;
            default:
                break;
        }
    }

    function getMuseums() {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "
                SELECT Museum.id, Museum.name, Museum.curator_id, AVG(Rating) as avg_rating
                FROM (Museum LEFT OUTER JOIN Review on Museum.id = Review.museum_id)
                GROUP BY Museum.id;
            ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $museums = [];
                while($museum = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $museums[] = $museum;
                }
                return $museums;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function getNameFromId(int $id) {
        return fetchMuseum($id)['name'];
    }

    function fetchMuseum(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT * FROM Museum WHERE id='" . $id . "';";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                return mysqli_fetch_array($result);
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function getMuseumsCurating(int $id) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "
                SELECT m.id, m.name, m.curator_id, AVG(Rating) AS avg_rating, exhibit_count
                FROM (
                (
                    SELECT Museum.id, Museum.name, Museum.curator_id, COUNT(*) AS exhibit_count
                    FROM Museum LEFT OUTER JOIN Exhibit ON Museum.id = Exhibit.museum_id
                    GROUP BY Museum.id
                ) AS m
                LEFT OUTER JOIN Review ON m.id = Review.museum_id)
                WHERE curator_id='" . $id . "'
                GROUP BY m.id;
            ";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $museums = [];
                while($museum = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $museums[] = $museum;
                }
                return $museums;
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
                return [];
            }
        }
    }

    function newMuseum($name) {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "SELECT *
                    FROM Museum
                    WHERE name ='" . $name . "';";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Duplicate museum?
                if (mysqli_num_rows($result) > 0) {
                    session_start();
                    $_SESSION['message'] = 'There already exists a museum with this name';
                    header('Location: ../admin/museum.php?action=add');
                } else {
                    // Save the museum
                    $sql = "
                        INSERT INTO Museum(name)
                        VALUES('" . $name . "');";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {

                        session_start();
                        $_SESSION['message'] = 'Museum created';
                        header('Location: ../admin/museum.php?action=add');
                    } else {
                        echo "Failed query<br>" . mysqli_error($conn);
                    }
                }
            } else {
                echo "Failed query<br>" . mysqli_error($conn);
            }
        }
    }

    function deleteMuseum($museum_id) {
        // Create connection
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Failed to connect to database";
        }

        $sql = "DELETE FROM Museum WHERE id='" . $museum_id . "';";

        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION['message'] = 'Museum deleted';
            header('Location: ../admin/museum.php?action=delete');
        } else {
            echo "Failed query<br>" . mysqli_error($conn);
        }
    }
?>
