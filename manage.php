<html>
    <head>
        <script>
            function confirmDelete() {
                document.getElementById("confirmation").hidden = "";
                document.getElementById("noButton").hidden = "";
                document.getElementById("yesButton").type = "submit";
                document.getElementById("delete").hidden = "hidden";
            }
            function cancelDelete() {
                document.getElementById("confirmation").hidden = "hidden";
                document.getElementById("noButton").hidden = "hidden";
                document.getElementById("yesButton").type = "hidden";
                document.getElementById("delete").hidden = "";
            }
        </script>
    </head>
    <body>
        <form method="post" action="api/users.php">
            <input type="hidden" name="action" value="logout">
            <input type="submit" value="Logout"/>
        </form>
        <form action="request.php">
            <input type="submit" value="Curator Request"/>
        </form>
        <form method="post" action="api/users.php">
            <input type="hidden" name="action" value="delete">
            <button id="delete" type="button" onclick="confirmDelete()">Delete Account</button>
            <span id="confirmation" hidden="hidden">Are you sure?</span>
            <button id="noButton" type="button" value="No" hidden="hidden" onclick="cancelDelete()">No</button>
            <input id="yesButton" value="Yes" type="hidden">
        </form>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
