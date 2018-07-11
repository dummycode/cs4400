<?php
    require_once(__DIR__ . '/../api/museums.php');

    function displayMuseums() {
        $museums = getMuseums();

        echo "<table border = 1>";

        echo "<tr><th>Museum Name</th></tr>";

        foreach($museums as $museum) {
            echo "<tr><td>" . $museum['name'] . "</td></tr>";
        }

        echo "</table>";
    }

?>
