<html>
    <body>
        <?php
            require_once(__DIR__ . '/../api/requests.php');

            echo "<h2>Curator Requests</h2>";

            $requests = getAllCuratorRequests();
            echo "<table border='1'>";
            echo "
            <tr>
                <th>Visitor</th>
                <th>Museum</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>";
            foreach($requests as $request) {
                echo "<tr>
                    <td>" . $request['email'] . "</td>
                    <td>" . $request['name'] . "</td>
                    <td>
                        <a href=\"javascript:{}\" onclick=\"document.getElementById('approveRequest" . $request['id'] . "').submit(); return false;\">Approve</a>
                        <form id='approveRequest" . $request['id'] . "' action='../api/requests.php' method='POST' style='margin:0px'>
                            <input type='hidden' name='id' value='" . $request['id'] . "'>
                            <input type='hidden' name='museum_id' value='" . $request['museum_id'] . "'>
                            <input type='hidden' name='visitor_id' value='" . $request['visitor_id'] . "'>
                            <input type='hidden' name='action' value='approve'>
                        </form>
                    </td>
                    <td>
                        <a href=\"javascript:{}\" onclick=\"document.getElementById('removeRequest" . $request['id'] . "').submit(); return false;\">Remove</a>
                        <form id='removeRequest" . $request['id'] . "' action='../api/requests.php' method='POST' style='margin:0px'>
                            <input type='hidden' name='id' value='" . $request['id'] . "'>
                            <input type='hidden' name='action' value='remove'>
                        </form>
                    </td>
                </tr>";
            }
            echo "</table>";
            echo '
                <form action="index.php">
                    <input type="submit" value="Back"/>
                </form>
            ';
        ?>
    </body>
</html>
