<?php
include 'db.inc.php';
if (isset($_POST['select'])) {
    $select = $_POST['select'];
    switch ($select) {
        case 'all':
            $result = mysqli_query($connection, "SELECT * FROM todo ORDER BY id desc");
            break;
        case 'complete':
            $result = mysqli_query($connection, "SELECT * FROM todo WHERE checkbox=1");
            break;
        case 'incomplete':
            $result = mysqli_query($connection, "SELECT * FROM todo WHERE checkbox=0");
            break;
        default:
            $result = mysqli_query($connection, $query);
            break;
    }
}
