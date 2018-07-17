<?php
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'add':
                addMuseumView();
                break;
            case 'delete':
                deleteMuseumView();
                break;
            default:
                break;
        }
    }

    function addMuseumView() {
        require_once(__DIR__ . '/../gui/museums.php');
        echo newMuseumForm();
        // add museum here
    }

    function deleteMuseumView() {
        require_once(__DIR__ . '/../gui/museums.php');
        echo deleteMuseumForm();
    }
?>
