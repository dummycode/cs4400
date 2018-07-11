<?php
    function getDatabaseConnection() {
        $config = require(__DIR__ . '/../config.php');
        $database = $config['database'];
        // Database configurations
        $host = $database['host'];
        $user = $database['user'];
        $pass = $database['pass'];
        $name = $database['name'];

        // Create connection
        return mysqli_connect($host, $user, $pass, $name);
    }
?>
