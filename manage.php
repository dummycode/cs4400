<html>
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
            <input type="submit" value="Delete Account"/>
        </form>
        <form action="index.php">
            <input type="submit" value="Back"/>
        </form>
    </body>
</html>
