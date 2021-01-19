<?php

if (isset($_POST['id'])) {
    include 'db.inc.php';
    // Get Id From Post Method
    $id = $_POST['id'];
    if (empty($id)) {
        echo 'error';
    } else {
        // Select Task From Info table 
        $record = mysqli_query($connection, "SELECT * FROM todo WHERE id=$id");
        $todo = mysqli_fetch_array($record);

        $uId = $todo['id'];
        $checked = $todo['checkbox'];
        $uChecked = $checked ? 0 : 1;


        //Update Task Completed Status
        $res = mysqli_query($connection, "UPDATE todo SET checkbox=$uChecked WHERE id=$uId");

        if ($res) {
            echo $checked;
        } else {
            echo "error";
        }
        $connection = null;
        exit();
    }
} else {
    header("Location: ../index.php?mess=error");
}
