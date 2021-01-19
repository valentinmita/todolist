<?php
include 'db.inc.php';

if (isset($_POST['valuetoSearch'])) {
    $valuetoSearch = $_POST['valuetoSearch'];
    $result = mysqli_query($connection, "SELECT * FROM todo WHERE t_name  LIKE '%$valuetoSearch%'");
    $count = mysqli_num_rows($result);

    if ($count < 1) {

        echo '<script language="javascript" type="text/javascript"> 
        alert("error: the task does not exist");
        window.location = "index.php";
</script>';
    }
}
