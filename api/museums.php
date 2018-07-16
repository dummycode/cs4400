<?php
    require_once(__DIR__ . '/../crud/database.php');


    function getMuseums() {
        $conn = getDatabaseConnection();
        if (!$conn) {
            echo "Error connecting to database<br>";
        } else {
            $sql = "
                SELECT Museum.id, Museum.name, AVG(Rating) as avg_rating
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
                SELECT Museum.id, Museum.name, AVG(Rating) as avg_rating
                FROM (Museum LEFT OUTER JOIN Review on Museum.id = Review.museum_id)
                WHERE curator_id='" . $id . "'
                GROUP BY Museum.id";

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
?>
