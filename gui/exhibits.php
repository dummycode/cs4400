<?php
    function newExhibitForm(int $museum_id) {
        return <<<HTML
            <head>
                <script>
                    function formCheck() {
                        if (document.getElementById("name").value.length !== 0
                            && document.getElementById("year").value.length !== 0) {
                            document.getElementById("submitButton").disabled = "";
                        } else {
                            document.getElementById("submitButton").disabled = "disabled";
                        }
                    }
                </script>
            </head>
            <form id="exhibitForm" action="api/exhibits.php" method="post">
                Name*: <input id="name" type="text" name="name" onkeyup="formCheck()"><br>
                Year*: <input id="year" type="text" name="year" onkeyup="formCheck()"><br>
                URL: <input type="text" name="url"><br>

                <input type="hidden" name="action" value="create">
                <input type="hidden" name="museum_id" value="$museum_id"/>

                <input id="submitButton" type="submit" value="Submit Exhibit" disabled="disabled">
            </form>
HTML;
    }
?>
