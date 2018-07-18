<?php
    function requestForm() {
        require_once(__DIR__ . '/../api/museums.php');
        require_once(__DIR__ . '/../crud/user.php');

        $museums = getMuseums();

        $options = "";
        foreach ($museums as $museum) {
            $options .= "<option value='" . $museum['id'] . "'>" . $museum['name'] . "</option>";
        }

        $id = myUserId();

        return <<<HTML
            <form action="api/curator.php" method="post">
                <select name="museum_id" onchange="formCheck()">
                    $options
                </select><br>
                <input type="hidden" name="action" value="request">
                <input type="hidden" name="id" value="$id"/>
                <input type="submit">
            </form>
HTML;
    }
?>
