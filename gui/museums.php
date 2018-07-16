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
                    <td><a href=\"./museum.php?id=" . $museum['id'] . "&curator=" . $curator . "\">" . $museum['name'] . "</a></td>
                    " . ($curator ? "<td>" . $exhibit_count . "</td>" : "") . "
                    <td>" . $rating . "/5</td>
                </tr>
            ";
        }
        echo "</table>";
    }

    function displayMuseum(int $id, $curator = false) {
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
            " . ($curator ? "<th>Remove Exhibit</th>" : "") . "
        </tr>";
        foreach($exhibits as $exhibit) {
            echo "<tr>
                <td>" . $exhibit['name'] . "</td>
                <td>" . $exhibit['year'] . "</td>
                <td><a href=\"" . $exhibit['url'] . "\">" . $exhibit['url']. "</a></td>
                " . ($curator ? "<td>
                    <a href=\"javascript:{}\" onclick=\"document.getElementById('removeExhibit" . $exhibit['id'] . "').submit(); return false;\">Remove</a>
                    <form id='removeExhibit" . $exhibit['id'] . "' action='api/exhibits.php' method='POST' style='margin:0px'>
                        <input type='hidden' name='museum_id' value='" . $id . "'>
                        <input type='hidden' name='id' value='" . $exhibit['id'] . "'>
                        <input type='hidden' name='action' value='remove'>
                    </form>
                </td>" : "") . "
            </tr>";
        }
        echo "</table>";
    }
?>
