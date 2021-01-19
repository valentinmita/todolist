
<?php
include 'db.inc.php';
if (isset($_POST['todo'])) {
    $todo = $_POST['todo'];
    $date = date('l dS F\,Y');
    $sql = "INSERT INTO todo(t_name,t_date) VALUES('$todo','$date');";
    $results = mysqli_query($connection, $sql);
    if (!$results) {
        die("failed");
    } else {
        header("location:index.php?todo-added");
    }
}
