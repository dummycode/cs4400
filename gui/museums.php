<html>
    <body>
        <h1>All Museums</h1>
        <?php
            require_once(__DIR__ . '/../api/museums.php');
            $museums = getMuseums();
            echo "<table border = '1'>";
            echo "<tr><th>Museum Name</th></tr>";
            foreach($museums as $museum) {
                echo "<tr><td>" . $museum['name'] . "</td></tr>";
            }
            echo "</table>";
        ?>
        <form action="../index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
