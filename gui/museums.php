<?php
    function displayAllMuseums() {
        require_once(__DIR__ . '/../api/museums.php');
        $museums = getMuseums();
        displayMuseums($museums);
    }

    function displayMuseumsCurating(int $id) {
        require_once(__DIR__ . '/../api/museums.php');
        $museums = getMuseumsCurating($id);
        displayMuseums($museums, true);
    }

    function displayMuseums($museums, bool $curator = false) {
        echo "<table border='1'>";
        echo "
        <tr>
            <th>Museum Name</th>
            " . ($curator ? "<th>Exhibit Count</th>" : "") . "
            <th>Rating</th>
        </tr>";
        foreach($museums as $museum) {
            $rating = $museum['avg_rating'] ? round($museum['avg_rating'], 1) : '-';
            $exhibit_count = $museum['exhibit_count'] ?? 0;
            echo "
                <tr>
                    <td><a href=\"./museum.php?id=" . $museum['id'] . "\">" . $museum['name'] . "</a></td>
                    " . ($curator ? "<td>" . $exhibit_count . "</td>" : "") . "
                    <td>" . $rating . "/5</td>
                </tr>
            ";
        }
        echo "</table>";
    }

    function displayMuseum(int $id) {
        require_once(__DIR__ . '/../api/museums.php');
        require_once(__DIR__ . '/../api/exhibits.php');

        echo "<h1>" . getNameFromId($id) . "<?</h1>";

        $exhibits = getExhibitsForMuseum($id);
        echo "<table border='1'>";
        echo "
        <tr>
            <th>Exhibit</th>
            <th>Year</th>
            <th>Link</td>
        </tr>";
        foreach($exhibits as $exhibit) {
            echo "<tr>
                <td>" . $exhibit['name'] . "</td>
                <td>" . $exhibit['year'] . "</td>
                <td><a href=\"" . $exhibit['url'] . "\">" . $exhibit['url']. "</a></td>
            </tr>";
        }
        echo "</table>";
    }
?>
