<?php
include 'db.inc.php';
if (isset($_GET['delete_todo'])) {
    $dtl_todo = $_GET['delete_todo'];
    $sqli = "DELETE FROM todo WHERE id = $dtl_todo";
    $res = mysqli_query($connection, $sqli);

    if (!$res) {
        die("failed");
    } else {
        header("location:index.php?todo-deleted");
    }
}
